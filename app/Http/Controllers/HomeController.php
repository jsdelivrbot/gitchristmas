<?php

namespace App\Http\Controllers;

use App\Trigger;
use Illuminate\Http\Request;
use App\Repository;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags2 = Trigger::all()->toArray();
        $tags  = Repository::all()->toArray();

        $responseRepositories[0] = ['value' => '', 'text' => ''];

        if (!empty($tags)) {
            foreach ($tags as $key => $tag) {
                $responseRepositories[$key] = ['value' => $tag['name'], 'text' => $tag['name']];
            }
        }

        if (!empty($tags2)) {
            foreach ($tags2 as $key => $tag) {
                $responseTriggers[$key] = ['value' => $tag['name'], 'text' => $tag['name']];
            }
        }
        $responseTriggers     = (isset($responseTriggers)) ? json_encode($responseTriggers) : '';
        $responseRepositories = (isset($responseRepositories)) ? json_encode($responseRepositories) : '';

        return view('welcome', compact('responseTriggers', 'responseRepositories'));
    }

    /**
     * Returns a list of tags.
     *
     * @param null $id
     * @param null $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRepositories($id = null, $tag = null)
    {
        $tags = Repository::select('name AS text')
            ->groupBy('name')
            ->get()
            ->toArray();

        $responseRepositories[0] = ['value' => '', 'text' => ''];

        if (!empty($tags)) {
            foreach ($tags as $key => $tag) {
                $responseRepositories[$key] = ['value' => $tag['text'], 'text' => $tag['text']];
            }
        }

        return response()
            ->json($responseRepositories);
    }


    /**
     * Returns list of triggers
     *
     * @param null $id
     * @param null $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTriggers($id = null, $tag = null)
    {
        $tags = Trigger::select('name AS text')
            ->groupBy('name')
            ->get()
            ->toArray();

        $responseTriggers[0] = ['value' => '', 'text' => ''];

        if (!empty($tags)) {
            foreach ($tags as $key => $tag) {
                $responseTriggers[$key] = ['value' => $tag['text'], 'text' => $tag['text']];
            }
        }

        return response()
            ->json($responseTriggers);
    }

    /**
     * Handle tags inputs and prepare for persists.
     *
     * @param $tags
     * @return array|bool
     */
    public function prePersitTag($tags, $type = false, $requestData)
    {
        if ($tags == '') {
            return true;
        }

        if ($type == true ) {
            Trigger::truncate();
        }

        if ($type == false) {
            Repository::truncate();
        }

        if (!isset($tags) || empty($tags)) {
            return false;
        }

        $tags2 = explode(',', $tags);

        foreach ($tags2 as $tag) {
            $tagList[] = ['name' =>  $tag];
        }


        if (!empty($tagList)) {
            $tagIds = [];

            foreach ($tagList as $tag) {
                if ($type == true) {
                    $tagIds[] = Trigger::firstOrCreate($tag)->id;
                }
                if ($type == false){
                    $tagIds[] = Repository::firstOrCreate($tag)->id;
                }
            }
        }

        return $tagIds;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $requestData = $request->all();
        $this->prePersitTag($requestData['triggers-git'], false, $requestData);
        $this->prePersitTag($requestData['triggers-hipchat'], true, $requestData);
        return redirect('/');
    }


    /**
     * @param Request $request
     * @param null $type
     * @return array|bool
     */
    public function persistData(Request $request, $type = null)
    {
        $requestData = $request->all();

        return $this->prePersitTag($requestData[sprintf('tags%s', $type)]);
    }
}
