<?php

namespace Bolt\Storage\Database\Schema\Comparison;

use Bolt\Storage\Database\Schema\Manager;
use Bolt\Storage\Database\Schema\SchemaCheck;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Schema\Comparator;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\TableDiff;
use Pimple;
use Psr\Log\LoggerInterface;

/**
 * Base class for handling table comparison.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
abstract class BaseComparator
{
    /** @var \Doctrine\DBAL\Connection */
    protected $connection;
    /** @var \Bolt\Storage\Database\Schema\Manager */
    protected $manager;
    /** @var \Pimple */
    protected $schemaTables;
    /** @var \Psr\Log\LoggerInterface */
    protected $systemLog;

    /** @var \Doctrine\DBAL\Schema\TableDiff[] */
    protected $diffs;
    /** @var \Doctrine\DBAL\Schema\Table[] */
    protected $tablesCreate;
    /** @var \Doctrine\DBAL\Schema\TableDiff[] */
    protected $tablesAlter;
    /** @var array */
    protected $ignoredChanges = [];
    /** @var boolean */
    protected $pending;
    /** @var \Bolt\Storage\Database\Schema\SchemaCheck */
    protected $response;

    /**
     * Constructor.
     *
     * @param Connection      $connection
     * @param Manager         $manager
     * @param Pimple          $schemaTables
     * @param LoggerInterface $systemLog
     */
    public function __construct(Connection $connection, Manager $manager, Pimple $schemaTables, LoggerInterface $systemLog)
    {
        $this->connection = $connection;
        $this->manager = $manager;
        $this->schemaTables = $schemaTables;
        $this->systemLog = $systemLog;
    }
}
