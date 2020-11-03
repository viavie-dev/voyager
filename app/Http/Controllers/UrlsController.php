<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Url;
use Illuminate\Support\Str;
use Illuminate\validation\Rule;


class UrlsController extends Controller
{
    public function list()
    {
        //public function list(request $request){
        //dd('test');
        //$urls = Url::all();
        //dd($urls);
        //return view('Urls/list', compact('urls'));

        return view('Urls/list');
    }

    /**
     *  Renvoie la liste paginée des urls.
     *
     * @param Request $request
     * @return JsonResponse
     */

    public function getUrls(Request $request)
    {
        if (!$request->ajax()){
            return false;
        }

        //ddd($request);
        $columns = [
            0 => 'id',
            1 => 'url',
            2 => 'description',
            3 => 'created_at',
            4 => 'actions'
        ];

        $totalFiltered = $totalUrls = Url::count();

        $limit = $request->input('length'); // recupération de champ caché qui contient des valeurs
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $urls = Url::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $urls = Url::where('id', 'LIKE', "%{$search}%")
                ->orWhere('url', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Url::where('id', 'LIKE', "%{$search}%")
                ->orWhere('url', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];
        if (!empty($urls)) {
            foreach ($urls as $url) {
                $nestedData['id'] = $url->id;
                $nestedData['url'] = '<a href="' . $url->url . '" title="' . $url->url . '" target="_blank">' . Str::limit($url->url, 120) . '</a>';
                $nestedData['description'] = $url->description;
                $created_at = 'N/A';
                if (!empty($url->created_at)) {
                    $created_at = $url->created_at->format('Y-m-d H:i:s');
                }
                $nestedData['created_at'] = $created_at;

                $nestedData['actions'] = '
                                            <a href="' . route('deleteurl', $url->id) . '" class="btn btn-sm btn-danger pull-right delete">
                                                <i class="voyager-trash"></i>
                                            </a>
                                            <a href="' . route('editurl', $url->id) . '" class="btn btn-sm btn-primary pull-right edit">
                                                <i class="voyager-edit"></i>
                                            </a>
                                            ';

                $data[] = $nestedData;
            }
        }

        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalUrls),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data
        ];

        return response()->json($json_data);
        //echo json_encode($json_data);
    }

    public function edit(Url $url)
    {
        return view('Urls/edit', compact('url'));
    }


    public function new () {
        return view('Urls/new');;
    }

    /**
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create (Request $request){

        $validatedData = $request->validate( [

            'url'        => [
                'required',
                'string',
                'max:1024',

            ],
            'description' => [ 'required', 'string' ]
        ], [], [
            'url'        => '&laquo; Url &raquo;',
            'description' => '&laquo; Description &raquo;'
        ] );

    $newUrl = Url::create( [
            'url' => $validatedData['url'],
            'description'=> $validatedData['description']
        ]);

        return redirect('/admin/listurls')->with('success', 'Url with id=' . $newUrl->id . 'was updated successfuly') ;
    }
    /**
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function update(Request $request){

        $validatedData = $request->validate( [
            'id'                     => [ 'required', 'integer' ],
            'url'        => [
                'required',
                'string',
                'max:1024',
                Rule::unique( 'urls' )->ignore( $request->id )
            ],
            'description' => [ 'required', 'string' ]
        ], [], [
            'url'        => '&laquo; URL &raquo;',
            'description' => '&laquo; Description &raquo;'
        ] );

Url::where('id', '=', $validatedData['id'])->update([
    'url' => $validatedData['url'],
    'description'=> $validatedData['description']
]);

        return redirect('/admin/listurls')->with('success', 'Url with id=' . $validatedData['id'] . 'was updated successfuly') ;
    }

    public function delete(Url $url)
    {

        return view('Urls/delete', compact('url'));
    }
}
