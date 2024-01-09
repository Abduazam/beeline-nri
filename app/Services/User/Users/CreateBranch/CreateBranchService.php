<?php

namespace App\Services\User\Users\CreateBranch;

use Exception;
use App\Models\User\User;
use App\Models\User\UserBranch;
use Illuminate\Support\Facades\DB;

class CreateBranchService
{
    /**
     * @throws Exception
     */
    public function __construct(
        protected array $branches,
        protected User $user
    ) {
        $this->createUserBranch();
    }

    /**
     * @throws Exception
     */
    private function createUserBranch(): void
    {
        try {
            DB::beginTransaction();

            UserBranch::where('user_id', $this->user->id)->delete();

            if (!empty($this->branches)) {
                foreach ($this->branches as $branch) {
                    UserBranch::create([
                        'user_id' => $this->user->id,
                        'branch_id' => $branch
                    ]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
