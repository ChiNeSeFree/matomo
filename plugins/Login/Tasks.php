<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\Login;

use Piwik\Plugins\Login\Securit\BruteForceDetection;

class Tasks extends \Piwik\Plugin\Tasks
{
    /**
     * @var BruteForceDetection
     */
    private $bruteForceDetection;

    public function __construct(BruteForceDetection $bruteForceDetection)
    {
        $this->bruteForceDetection = $bruteForceDetection;
    }

    public function schedule()
    {
        $this->daily('cleanupBruteForceLogs');
    }

    public function cleanupBruteForceLogs()
    {
        $this->bruteForceDetection->cleanupOldEntries();
    }

}