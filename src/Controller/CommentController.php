<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/comments/{id}/vote/{direction<up|down>}', name: 'comment', methods: 'POST')]
    public function commentVote(int $id, string $direction, LoggerInterface $logger): Response
    {
        // todo:: use id to query database

        // use real logic here to save this to database
        if ($direction === 'up') {
            $logger->info('Voting up!');
            $currentVoteCount = mt_rand(7, 100);
        } else {
            $logger->info('Voting down!');
            $currentVoteCount = mt_rand(0, 5);
        }

        return $this->json(['votes' => $currentVoteCount]);
    }
}
