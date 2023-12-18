<?php

namespace App\Http\Support\Messages;

class PCCaseIssueMessages
{
    public static $notEnoughSata25Bays = "There are not enough 2.5\" bays on the PC Case for the amount of 2.5\" drives you've selected!
    If you want that many drives you will have to use internal adapter/s or external ones to turn the drives into external storage in order to get them all to work!";

    public static $notEnoughSata35Bays = "There are not enough 3.5\" bays on the PC Case for the amount of 3.5\" drives you've selected!
    If you want that many drives you will have to use internal adapter/s or external ones to turn the drives into external storage in order to get them all to work!";
}
