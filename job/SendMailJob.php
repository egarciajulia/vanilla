<?php

/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license GPL-2.0-only
 */

namespace Vanilla\Job;

use Vanilla\Scheduler\Job\JobExecutionStatus;
use Vanilla\Scheduler\Job\LocalJobInterface;
use Vanilla\VanillaMailer;

/**
 * SendMailJob
 *
 * @author Eduardo Garcia Julia <eduardo.garciajulia@vanillaforums.com>
 */
class SendMailJob implements LocalJobInterface {

    /** @var PHPMailer */
    protected $phpMailer;

    /**
     * Set Job Message
     *
     * @param array $message
     * @throws \Exception
     */
    public function setMessage(array $message) {
        $this->phpMailer = $message['phpMailer'] ?? null;

        if ($this->phpMailer == null || !$this->phpMailer instanceof VanillaMailer) {
            $msg = "Vanilla\Job\SendMailJob: invalid phpMailer payload";
            throw new \Exception($msg);
        }
    }

    /**
     * Run job
     *
     * @throws \Exception In case of error.
     */
    public function run(): JobExecutionStatus {

        $this->phpMailer->setThrowExceptions(true);

        if (!$this->phpMailer->send()) {
            throw new \Exception($this->phpMailer->ErrorInfo);
        }

        return JobExecutionStatus::complete();
    }
}
