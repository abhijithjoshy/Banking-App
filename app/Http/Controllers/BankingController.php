<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use App\Models\Statement;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class BankingController extends Controller
{

    public function dashboard()
    {


        $user = auth()->user();
        $history = History::where('user_id', $user->id)->first();
        if ($history) {

            $user_history = $history;
        } else {

            $history_table = new History;
            $history_table->user_id = $user->id;
            $history_table->ac_no = intval($user->id . now()->format('YmdHis'));
            $history_table->save();

            $user_history = History::where('user_id', $user->id)->first();
        }

        return view('dashboard', ['user_history' => $user_history, 'user' => $user]);
    }






    public function deposit(Request $request)
    {
        $user = auth()->user();

        try {

            $history = History::where('user_id', $user->id)->first();
            $history->current_balance = $history->current_balance + $request->amount;
            $history->save();
            $this->addDataToStatements($user->id, $request->amount, "Credit", 'Deposite', $history->current_balance);
        } catch (Exception $e) {
        }
    }


    public function withdraw(Request $request)
    {
        $user = auth()->user();

        try {

            $history = History::where('user_id', $user->id)->first();

            $history->current_balance = $history->current_balance - $request->amount;
            $history->save();
            $this->addDataToStatements($user->id, $request->amount, "Debit", 'Withdraw', $history->current_balance);
        } catch (Exception $e) {
        }
    }





    public function transfer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|min:0',
        ]);

        $user = auth()->user();

        try {
            DB::transaction(function () use ($user, $request) {
                $receiver = User::where('email', $request->email)->firstOrFail();

                $userHistory = History::where('user_id', $user->id)->firstOrFail();
                $userHistory->current_balance -= $request->amount;
                $userHistory->last_transaction_to = $receiver->id;
                $userHistory->save();

                $receiverHistory = History::where('user_id', $receiver->id)->firstOrFail();
                $receiverHistory->current_balance += $request->amount;
                $receiverHistory->last_transaction_from = $user->id;
                $receiverHistory->save();
                $this->addDataToStatements($user->id, $request->amount, "Debit", 'Transfer', $userHistory->current_balance);
            });



            return response()->json(['message' => 'Transfer successful'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Transfer failed'], 500);
        }
    }

    public function addDataToStatements($user_id, $amount, $type, $details, $balance)
    {
        $statement = new Statement();

        $statement->user_id = $user_id;
        $statement->amount = $amount;
        $statement->type = $type;
        $statement->details = $details;
        $statement->balance = $balance;

        $statement->save();
    }


    public function statement_index()
    {
        $user = auth()->user();

        $statements = Statement::where('user_id', $user->id)->get();

        return view('statement', ['statements' => $statements]);
    }
}
