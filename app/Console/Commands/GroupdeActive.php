<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Group;

class GroupdeActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'group:deactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will make Group Deactive';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today     = Carbon::now();
        $todayDate = $today->toDateString();
        Group::whereDate('end_date', '<', $todayDate )->update(['status' => 0 ]);
    }
}
