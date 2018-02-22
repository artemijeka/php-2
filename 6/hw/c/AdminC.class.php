<?php

class AdminC extends BaseC
{
    public function getAdmin()
    {
        if ($user_info['is_admin'] == 1) {
            MyTwigM::myTwigTemplate('user_info.twig', $vars);
            MyTwigM::myTwigTemplate('admin.twig', $vars);
        }
    }
}