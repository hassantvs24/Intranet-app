<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Card;

class CardController extends BaseController
{
    public function index()
    {
        $cards = Card::all();


        if (is_null($cards)) {
            return $this->sendError('Cards not found.');
        }

        return $this->sendResponse($cards->toArray(), 'cards retrieved successfully.');
    }


    public function store(Request $request)
    {
        $card = new Card();
        $card->title = $request->title;
        $card->board_id = $request->board_id;
        $card->card_type = $request->card_type;
        $card->is_visible = $request->is_visible;
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
        $card->title = $request->title;
        $card->board_id = $request->board_id;
        $card->card_type = $request->card_type;
        $card->is_visible = $request->is_visible;
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
