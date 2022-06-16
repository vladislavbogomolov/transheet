<?php

namespace Vladislavbogomolov\Transheet\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Env;
use Laravel\Tinker\ClassAliasAutoloader;
use Psy\Configuration;
use Psy\Shell;
use Psy\VersionUpdater\Checker;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Vladislavbogomolov\Transheet\TransheetController;

class TransheetCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'transheet:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download translation from GoogleSheet';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $v = new TransheetController();

        dd($v->downloadTranslations());
    }

}
