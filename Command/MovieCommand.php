<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BaksDev\Tmdb\Command;

use BaksDev\Tmdb\Api\TMDBMovie;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Получаем "НОВЫЕ" заказы
 */

#[AsCommand(name: 'baks:tmdb:new')]
class MovieCommand extends Command
{
    private TMDBMovie $theMovieDB;

    public function __construct(
        TMDBMovie $theMovieDB
    )
    {
        parent::__construct();

        $this->theMovieDB = $theMovieDB;
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->theMovieDB->handle();

        $io->success('Новые заказы успешно добавлены в очередь');

        return Command::SUCCESS;

    }
}
