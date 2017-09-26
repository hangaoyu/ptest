<?php

namespace Hgy\PackageTest\Console;

use Illuminate\Console\Command;

class SayHelloCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'packages:hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test package console';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('hello packages');
    }


}
