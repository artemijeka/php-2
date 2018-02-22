<?php

class AdminC extends BaseC
{
    public function getAdmin()
    {
        MyTwigM::myTwigTemplate('admin.twig');
        
    }
    
}