<?php


class ControllerIdea
{
    public static function viewIdea()
    {
        require("config.php");
        require("../../public/documentation/idea.php");
    }

    public static function viewProjet()
    {
        require("config.php");
        require("../../public/documentation/projet.php");
    }
}