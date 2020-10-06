<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Card;

class CardController extends BaseController
{
    public function index(Request $request)
    {
        $cards = Card::all()->where('board_id', '=', $request['board_id']);

        if (is_null($cards)) {
            return $this->sendError('Cards not found.');
        }

        return $this->sendResponse($cards->toArray(), 'cards retrieved successfully.');
    }

    public function store(Request $request)
    {
        $card = new Card();
        $card->title = $request->title;
        $card->html_content = $request->html_content;
        $card->board_id = $request->board_id;
        $card->card_type = $request->card_type;
        $card->is_visible = $request->is_visible;

        if( $request->view_type ) {
            $card->view_type = $request->view_type;
        }

        $card->save();
        if (is_null($card)) {
            return $this->sendError('Cards not found.');
        }

        return $this->sendResponse($card->toArray(), 'cards added successfully.');
    }

    public function show($id)
    {
        $card = Card::find($id);
        if (is_null($card)) {
            return $this->sendError('Cards not found.');
        }

        return $this->sendResponse($card->toArray(), 'cards retrieved successfully.');
    }

    public function update(Request $request, $id)
    {
        $card = Card::find($id);

        if( $request->title ) {
            $card->title = $request->title;
        }

        $card->board_id = $request->board_id;

        if( $request->card_type ) {
            $card->card_type = $request->card_type;
        }

        if( $request->html_content ) {
            $card->html_content = $request->html_content;
        }

        if( $request->is_visible ) {
            $card->is_visible = $request->is_visible;
        }

        if( $request->view_type ) {
            $card->view_type = $request->view_type;
        }

        $card->save();

        if (is_null($card)) {
            return $this->sendError('Cards can not be updated.');
        }

        return $this->sendResponse($card->toArray(), 'cards updated successfully.');
    }

    public function destroy($id)
    {
        $card =  Card::findOrFail($id)->delete();
        return $this->sendResponse($card->toArray(), 'cards deleted successfully.');
    }
}
