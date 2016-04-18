<?php
namespace CodeCloud\ShopifyFramework\Http\Controller;

class UserController extends Controller
{
    public function getFinalise()
    {
        return view('user.finalise');
    }
}