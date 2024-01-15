<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BaksDev\TheMovieDB\Command;

use BaksDev\Core\Messenger\MessageDispatchInterface;
use BaksDev\TheMovieDB\Api\TheMovieDB;
use BaksDev\Users\Profile\UserProfile\Type\Id\UserProfileUid;
use BaksDev\Wildberries\Orders\Messenger\NewOrders\NewOrdersMessage;
use BaksDev\Wildberries\Repository\AllProfileToken\AllProfileTokenInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Получаем "НОВЫЕ" заказы
 */

#[AsCommand(name: 'baks:tmdb:new')]
class MovieCommand extends Command
{

    private TheMovieDB $theMovieDB;

    public function __construct(
        TheMovieDB $theMovieDB
    )
    {
        parent::__construct();

        $this->theMovieDB = $theMovieDB;
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $profile = $input->getArgument('profile');

        $this->theMovieDB->

        $io->success('Новые заказы успешно добавлены в очередь');

        return Command::SUCCESS;

    }
}
