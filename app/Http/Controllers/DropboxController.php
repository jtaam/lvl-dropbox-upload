<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \GuzzleHttp\Client;

class DropboxController extends Controller
{
  public function form() { // get
    return view('form');
  } // form()

  public function upload(Request $request){ // post
    $accessToken = env('DROPBOX_ACCESS_TOKEN');
    $client = new \GuzzleHttp\Client();

    $file = $request->file('upload_file');
    $path = $file->storeAs('uploads', $file->getClientOriginalName());

    $response = $client->post('https://content.dropboxapi.com/2/files/upload', [
      'headers'  => [
        'Authorization' => 'Bearer '.$accessToken,
        'Dropbox-API-Arg' => json_encode([
          'path'=> '/public-uploads/'.$file,
          'mode'=> 'add',
          'autorename'=> true,
          'mute'=> false,
          'strict_conflict'=> false,
        ]),
        'Content-Type' => 'application/octet-stream',
        'body'=> fopen($path, 'r'),
      ]
    ]);
    return json_decode($response->getBody()->getContents(), true);
  } // upload()

} // DropboxController
