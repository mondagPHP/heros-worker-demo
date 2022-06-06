<?php
declare(strict_types=1);

namespace App\Modules\Index\Action;

use Framework\Annotation\Controller;
use Framework\Annotation\RequestMapping;
use Framework\Util\Res;

#[Controller(DemoAction::class)]
class DemoAction
{
    #[RequestMapping('/demo/ok', 'ok')]
    public function ok(): Res
    {
        return Res::pager(2, [
            ['id' => 1, 'name' => 'tom'],
            ['id' => 2, 'name' => 'tom2'],
        ]);
    }
}