<?php

namespace App\Http\Controllers;

// models
use App\Event;
use App\Millionaire;
use Illuminate\Http\Request;

class MillionaireController extends Controller
{
    /**
     * It creates a new Millionaire object and saves it to the database
     *
     * @param Request request The request object.
     * @param Event event The event that the bingo belongs to.
     *
     * @return A JSON object with the bingo created.
     */
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'number_of_stages' => 'required|numeric',
        ]);

        $data = $request->json()->all();
        $data['event_id'] = $event->_id;
        //crear numero de etapas 
        $data['stages'] = [];
        $score_base = 100;
        for ($i = 0; $i < $data['number_of_stages']; $i++) {
            $data['stages'][$i] = [
                'id' => uniqid(),
                'number' => ($i + 1),
                'life_save' => false,
                'score' => $score_base * ($i + 1),
                'question' => null
            ];
        }
        $millionaire = Millionaire::create($data);

        //Nuevo atributo para el bingo creado. $event->dynamics.
        if (isset($event->dynamics)) {
            $dynamics = $event->dynamics;
            $dynamics["millionaire"] = true;
        } else {
            $dynamics["millionaire"] = true;
        }
        $event->dynamics = $dynamics;
        $event->save();

        return response()->json($millionaire, 201);
    }

    /**
     * BingobyEvent_: search of Millionaire by event.
     *
     * @urlParam event required  event_id
     *
     */

    public function MillionairebyEvent(string $event_id)
    {
        $millionaire = Millionaire::where('event_id', $event_id)->first();
        return $millionaire;
    }

    /**
     * It takes a request, an event, and a bingo, and updates the bingo with the data from the request
     *
     * @param Request request The request object.
     * @param event The event ID
     * @param Millionaire bingo The Millionaire model instance
     *
     * @return The updated bingo object.
     */
    public function update(Request $request, $event, Millionaire $millionaire)
    {
        $request->validate([
            'number_of_stages' => 'required|numeric',
        ]);
        $data = $request->json()->all();
        //comprobar si la cantidad de etapas es la misma
        switch ($data['number_of_stages']) {
            case $data['number_of_stages'] > $millionaire->number_of_stages:
                $score_base = 100;
                $stages = $millionaire->stages;
                for ($i = $millionaire->number_of_stages; $i < $data['number_of_stages']; $i++) {
                    $stages[$i] = [
                        'id' => uniqid(),
                        'number' => ($i + 1),
                        'life_save' => false,
                        'score' => $score_base * ($i + 1),
                        'question' => null
                    ];
                }
                $millionaire->stages = $stages;
                break;
            case $data['number_of_stages'] < $millionaire->number_of_stages:
                $stages = $millionaire->stages;
                for ($i = $millionaire->number_of_stages; $i > $data['number_of_stages']; $i--) {
                    unset($stages[$i - 1]);
                }
                $millionaire->stages = $stages;
            break;
        }
        
        $millionaire->fill($data);
        $millionaire->save();

        return response()->json($millionaire, 200);
    }

    /**
     * It deletes a bingo and all its cards
     *
     * @param Event event The event that the bingo belongs to.
     * @param Millionaire bingo The Millionaire object that will be deleted.
     *
     * @return 204 No Content
     */
    public function destroy(Event $event, Millionaire $millionaire)
    {
        if (isset($event->dynamics)) {
            $dynamics = $event->dynamics;
            $dynamics["millionaire"] = false;
        } else {
            $dynamics["millionaire"] = false;
        }
        $event->dynamics = $dynamics;
        $millionaire->delete();
        $event->save();
        return response()->json([], 204);
    }

    /**
     * It adds a new stage to the stages array of a millionaire
     * 
     * @param Request request The request object.
     * @param Millionaire millionaire The id of the millionaire game
     * 
     * @return The millionaire object with the new stage added.
     */
    public function addStage(Request $request, Millionaire $millionaire)
    {
        $request->validate([
            'number' => 'required|numeric',
            'life_save' => 'required|boolean',
            'score' => 'required|numeric',
        ]);
        $data = $request->json()->all();
        $data['id'] = uniqid();
        $stages = $millionaire->stages ? $millionaire->stages : [];
        array_push($stages, $data);
        $millionaire->stages = $stages;
        $millionaire->save();
        return response()->json($millionaire, 201);
    }

    /**
     * It takes a request, a millionaire model, and a stage id, validates the request, gets the data
     * from the request, gets the stages from the millionaire model, finds the index of the stage id in
     * the stages array, merges the data with the stage at the index, saves the millionaire model, and
     * returns the millionaire model
     * 
     * @param Request request The request object.
     * @param Millionaire millionaire The id of the millionaire you want to update.
     * @param stage_id The id of the stage you want to update.
     * 
     * @return The updated millionaire object.
     */
    public function updateStage(Request $request, Millionaire $millionaire, $stage_id)
    {
        $request->validate([
            'number' => 'required|numeric',
            'life_save' => 'required|boolean',
            'score' => 'required|numeric',
        ]);
        $data = $request->json()->all();
        $stages = $millionaire->stages;
        $index = array_search($stage_id, array_column($stages, 'id'));
        $merge = array_merge($stages[$index], $data);
        $stages[$index] = $merge;
        $millionaire->stages = $stages;
        $millionaire->save();
        return response()->json($millionaire);
    }

    /**
     * > Remove a stage from a millionaire's stages array
     * 
     * @param Millionaire millionaire The millionaire object that you want to add the stage to.
     * @param stage_id The id of the stage to be removed
     * 
     * @return The millionaire object is being returned.
     */
    public function removeStage(Millionaire $millionaire, $stage_id)
    {
        $stages = $millionaire->stages;
        $new_stages = [];
        foreach ($stages as $stage) {
            if ($stage['id'] != $stage_id) {
                array_push($new_stages, $stage);
            }
        }
        $millionaire->stages = $new_stages;
        $millionaire->save();
        return response()->json($millionaire);
    }

    /**
     * It takes a request, validates it, adds a unique id to the question and answers, adds the
     * question to the questions array, and saves the millionaire
     * 
     * @param Request request The request object
     * @param Millionaire millionaire The id of the millionaire game
     * 
     * @return The response is a JSON object containing the updated millionaire object.
     */
    public function addOneQuestion(Request $request, Millionaire $millionaire)
    {
        $request->validate([
            'question' => 'required|string',
            'time_limit' => 'required|numeric',
            'type' => 'required|string',
            'answers' => 'required|array',
        ]);

        $data = $request->json()->all();
        $data['id'] = uniqid();
        $new_answers = [];
        foreach($data['answers'] as $answer) {
            $answer['id'] = uniqid();
            array_push($new_answers, $answer);
        }

        $data['answers'] = $new_answers;
        $questions = $millionaire->questions ? $millionaire->questions : [];
        array_push($questions, $data);
        $millionaire->questions = $questions;
        $millionaire->save();
        return response()->json($millionaire, 201);
    }

    /**
     * It takes a request, a millionaire object, and a question id, validates the request, gets the
     * data from the request, gets the questions from the millionaire object, finds the index of the
     * question id in the questions array, merges the data with the question at the index, saves the
     * millionaire object, and returns the millionaire object
     * 
     * @param Request request The request object.
     * @param Millionaire millionaire The Millionaire model instance
     * @param question_id The id of the question you want to update.
     * 
     * @return The updated millionaire object.
     */
    public function updateQuestion(Request $request, Millionaire $millionaire, $question_id)
    {
        $request->validate([
            'question' => 'required|string',
            'time_limit' => 'required|numeric',
            'type' => 'required|string',
        ]);
        $data = $request->json()->all();
        $questions = $millionaire->questions;
        $index = array_search($question_id, array_column($questions, 'id'));
        $merge = array_merge($questions[$index], $data);
        $questions[$index] = $merge;
        $millionaire->questions = $questions;
        $millionaire->save();
        return response()->json($millionaire);
    }

    /**
     * > Remove a question from the questions array of a millionaire object
     * 
     * @param Millionaire millionaire The Millionaire object that we're working with.
     * @param question_id the id of the question to be removed
     * 
     * @return The millionaire object with the new questions array.
     */
    public function removeOneQuestion(Millionaire $millionaire, $question_id)
    {
        //comprobar si la pregunta esta asignada a una etapa
        foreach($millionaire->stages as $stage) {
            $stage_question = $stage['question'] ? $stage['question'] : null;
            if($stage_question == $question_id) {
                return response()->json(['error' => 'The question is assigned to a stage'], 400);
            }
        }

        $questions = $millionaire->questions;
        $new_questions = [];
        foreach ($questions as $question) {
            if ($question['id'] != $question_id) {
                array_push($new_questions, $question);
            }
        }
        $millionaire->questions = $new_questions;
        $millionaire->save();
        
        return response()->json($millionaire);
    }

    /**
     * It adds an answer to a question in a millionaire game
     * 
     * @param Request request The request object.
     * @param Millionaire millionaire The millionaire object that we want to add the answer to.
     * @param question_id The id of the question to which the answer will be added.
     * 
     * @return The millionaire object with the new answer added to the question.
     */
    public function addOneAnswer(Request $request, Millionaire $millionaire, $question_id)
    {
        $request->validate([
            'answer' => 'required|string',
            'is_correct' => 'required|boolean',
            'is_true_or_false' => 'required|boolean',
            'type' => 'required|string',
        ]);
        $data = $request->json()->all();
        $data['id'] = uniqid();
        $questions = $millionaire->questions;
        $index = array_search($question_id, array_column($questions, 'id'));
        $answers = $questions[$index]['answers'];
        array_push($answers, $data);
        $questions[$index]['answers'] = $answers;
        $millionaire->questions = $questions;
        $millionaire->save();
        // comprobar si la respuesta es de una pregunta que esta asignada a un stage y actualizar el stage
        foreach($millionaire->stages as $stage) {
            if($stage['question']['id'] == $question_id) {
                App('App\Http\Controllers\MillionaireController')->assignQuestionToStage($millionaire, $stage['id'], $question_id);
            }
        }
        return response()->json($millionaire);
    }

    /**
     * It updates an answer of a question of a millionaire
     * 
     * @param Request request The request object.
     * @param Millionaire millionaire The millionaire object that we want to update.
     * @param question_id The id of the question that the answer belongs to.
     * @param answer_id The id of the answer to be updated.
     * 
     * @return The millionaire object with the updated answer.
     */
    public function updateAnswer(Request $request, Millionaire $millionaire, $question_id, $answer_id)
    {
        $request->validate([
            'answer' => 'required|string',
            'is_correct' => 'required|boolean',
            'is_true_or_false' => 'required|boolean',
            'type' => 'required|string',
        ]);
        $data = $request->json()->all();
        $questions = $millionaire->questions;
        $index = array_search($question_id, array_column($questions, 'id'));
        $answers = $questions[$index]['answers'];
        $index_answer = array_search($answer_id, array_column($answers, 'id'));
        $merge = array_merge($answers[$index_answer], $data);
        $answers[$index_answer] = $merge;
        $questions[$index]['answers'] = $answers;
        $millionaire->questions = $questions;
        $millionaire->save();
        // comprobar si la respuesta es de una pregunta que esta asignada a un stage y actualizar el stage
        foreach($millionaire->stages as $stage) {
            if($stage['question']['id'] == $question_id) {
                App('App\Http\Controllers\MillionaireController')->assignQuestionToStage($millionaire, $stage['id'], $question_id);
            }
        }
        return response()->json($millionaire);
    }

    /**
     * It removes an answer from a question in a millionaire game
     * 
     * @param Millionaire millionaire the millionaire object
     * @param question_id The id of the question that the answer belongs to.
     * @param answer_id The id of the answer to be removed.
     * 
     * @return The millionaire object with the updated questions.
     */
    public function removeOneAnswer(Millionaire $millionaire, $question_id, $answer_id)
    {
        $questions = $millionaire->questions;
        $index = array_search($question_id, array_column($questions, 'id'));
        $answers = $questions[$index]['answers'];
        $new_answers = [];
        foreach ($answers as $answer) {
            if ($answer['id'] != $answer_id) {
                array_push($new_answers, $answer);
            }
        }
        $questions[$index]['answers'] = $new_answers;
        $millionaire->questions = $questions;
        $millionaire->save();
        // comprobar si la respuesta es de una pregunta que esta asignada a un stage y actualizar el stage
        foreach($millionaire->stages as $stage) {
            if($stage['question']['id'] == $question_id) {
                App('App\Http\Controllers\MillionaireController')->assignQuestionToStage($millionaire, $stage['id'], $question_id);
            }
        }
        return response()->json($millionaire);
    }

    /**
     * It assigns a question to a stage.
     * 
     * @param Millionaire millionaire The Millionaire object that you want to assign the question to.
     * @param stage_id The id of the stage you want to assign the question to.
     * @param question_id The id of the question you want to assign to the stage.
     * 
     * @return The question is being returned.
     */
    public function assignQuestionToStage(Millionaire $millionaire, $stage_id, $question_id)
    {
        $stages = $millionaire->stages;
        $new_stages = [];
        foreach ($stages as $stage) {
            if ($stage['id'] == $stage_id) {
                $stage['question'] = $question_id;
            }
            array_push($new_stages, $stage);
        }
        $millionaire->stages = $new_stages;
        $millionaire->save();
        return response()->json($millionaire);
    }

    public function importQuestions(Request $request, Millionaire $millionaire)
    {
        $request->validate([
            'replace_questions' => 'required|boolean',
            'questions' => 'required|array',
        ]);
        $valuesToImport = $request->json()->all();

        if($valuesToImport['replace_questions']){ //flag
            $millionaire->questions = [];
            $millionaire->save();
        }

        $questions = $millionaire->questions ? $millionaire->questions : [];
        $success = [];
        $questions_fail = [];


        foreach($valuesToImport['questions'] as $value) {
            $count_fail = count($questions_fail);
            if(!isset($value['question']) || !isset($value['time_limit']) || !isset($value['type']) || !isset($value['answers'])) {
                array_push($questions_fail, $value);
            }
            if($value['type'] != 'text' && $value['type'] != 'image') {
                array_push($questions_fail, $value);
            }

            $new_answers = [];
            foreach($value['answers'] as $answer) {
                if(!isset($answer['answer']) || !isset($answer['is_correct']) || !isset($answer['is_true_or_false']) || !isset($answer['type'])) {
                    array_push($questions_fail, $value);
                }
                if($answer['type'] != 'text' && $answer['type'] != 'image') {
                    array_push($questions_fail, $value);
                }
                $answer['id'] = uniqid();
                array_push($new_answers, $answer);
            }

            if($count_fail == count($questions_fail)) {
                $value[ 'id' ] = uniqid();
                $value[ 'answers' ] = $new_answers;
                array_push($questions, $value);
                array_push($success, $value);
            }
        }

        $millionaire->questions = $questions;
        $millionaire->save();

        return response()->json(
            [
            'success' => $success,
            'count_success' => count($success),
            'fail' => $questions_fail,
            'count_fail' => count($questions_fail)
            ], 201
        );
    }
}
