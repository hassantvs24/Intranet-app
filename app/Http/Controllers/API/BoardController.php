<?php

namespace App\Http\Controllers\API;

use App\Card;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function show_cards($id){
        $cards = Card::where('board_id', $id)->get();

        $card_data = [];

        foreach ($cards as $row){
            $row_data['title'] = $row->title;
            $row_data['html_content'] = $row->html_content;
            $row_data['is_visible'] = $row->is_visible;
            $row_data['board_id'] = $row->board_id;
            $row_data['view_type'] = $row->view_type;
            array_push($card_data, $row_data);
        }

        return response()->json($card_data);
    }
}
