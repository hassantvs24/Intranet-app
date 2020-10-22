<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{

    public function create_card(Request $request, $language, $id){
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'card_title' => 'required|string',
            'card_type' => 'required|string',
            'view_type' => 'required|string',
            'html_content' => 'required|string',
            'is_visible' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            $card =new Card();
            $card->title = $request->card_title;
            $card->html_content = $request->html_content;
            $card->board_id = $id;
            $card->card_type = $request->card_type;
            $card->view_type = $request->view_type;
            $card->is_visible = $request->is_visible;
            $card->save();

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }

    public function update_card(Request $request, $language, $id){
        //dd($request->all());
        //dd($id);
        $validator = Validator::make($request->all(), [
            'card_title' => 'required|string',
            'card_id' => 'required|numeric',
            'card_type' => 'required|string',
            'view_type' => 'required|string',
            'html_content' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            $card = Card::find($request->card_id);
            $card->title = $request->card_title;
            $card->html_content = $request->html_content;
            $card->board_id = $id;
            $card->card_type = $request->card_type;
            $card->view_type = $request->view_type;
            $card->save();

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }

    public function is_visible(Request $request){

            $card = Card::find($request->id);
            $visible = $card->is_visible;
            if($visible == 1){
                $card->is_visible = 0;
            }else{
                $card->is_visible = 1;
            }
            $card->save();

        return 'Success';
    }
}
