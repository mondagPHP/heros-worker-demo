<?php
declare(strict_types=1);

namespace App\Modules\Index\Action;

use Framework\Annotation\Controller;
use Framework\Annotation\RequestMapping;
use Framework\Http\HttpRequest;
use Framework\Util\Res;

#[Controller(name: IndexAction::class)]
class IndexAction
{
    #[RequestMapping('/index/index', 'index', ['GET'])]
    public function index(HttpRequest $request): Res
    {
        $name = $request->get('name');
        return Res::ok()->data(['name' => $name]);
    }

}