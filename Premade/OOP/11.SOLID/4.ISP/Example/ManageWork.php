<?php

class ManageWork 
{
    public function manageWork(Workable $worker)
    {
        $worker->work();
    }
}

$manageWork = new ManageWork();