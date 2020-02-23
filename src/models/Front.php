<?php
namespace model;
use DATABASE\methods;
class Front
{
    public $guideTitle;
    public $guideText;
    public $aboutTitle;
    public $rules;
    public $aboutText;
    public $aboutPageTitle;
    public $aboutPageText;
    public $aboutPagePic;
    public $sideBarFirstTitle;
    public $sideBarFirstText;
    public $sideBarSecTitle;
    public $sideBarSecText;

    function __construct($guide = false, $footerAbout = false,$rules = false,$aboutPage = false)
    {
        if ($guide) {
            $this->getGuide();
        }
        if ($footerAbout) {
            $this->getAboutFooter();
        }
        if ($rules) {
            $this->getRules();
        }
        if ($aboutPage) {
            $this->getAboutPage();
        }
        $this->getSideBar();
    }

    private function getGuide()
    {
        global $db;
        $guide = $db->query("select * from tblFront where `key` = 'guide'")->fetch_object();
        $this->setGuideTitle($guide->title);
        $this->setGuideText($guide->text);
    }
    private function getSideBar(){
        global $db;
        $sideBarFirst = $db->query("select * from tblFront where `key` = 'sideBarFirst'")->fetch_object();
        $sideBarSec = $db->query("select * from tblFront where `key` = 'sideBarSec'")->fetch_object();
        $this->sideBarFirstTitle = $sideBarFirst->title;
        $this->sideBarFirstText = $sideBarFirst->text;
        $this->sideBarSecTitle = $sideBarSec->title;
        $this->sideBarSecText = $sideBarSec->text;
    }
    private function setGuideTitle($title)
    {
        $this->guideTitle = $title;
    }

    private function setGuideText($guideText)
    {
        $this->guideText = $guideText;
    }

    private function getAboutFooter()
    {
        global $db;
        $aboutFooter = $db->query("select * from tblFront where `key` = 'footerAbout'")->fetch_object();
        $this->setFooterAboutTitle($aboutFooter->title);
        $this->setFooterAboutText($aboutFooter->text);
    }

    private function getAboutPage()
    {
        global $db;
        $aboutFooter = $db->query("select * from tblFront where `key` = 'about'")->fetch_object();
        $this->setAboutPageTitle($aboutFooter->title);
        $this->setAboutPageText($aboutFooter->text);
        $this->setAboutPagePic($aboutFooter->pic);
    }

    private function setFooterAboutTitle($title)
    {
        $this->aboutTitle = $title;
    }

    private function setFooterAboutText($Text)
    {
        $this->aboutText = $Text;
    }
    private function setRules($Rules)
    {
        $this->rules = $Rules;
    }

    private function getRules()
    {
        global $db;
        $rule = $db->query("select * from rules")->fetch_object();
        $this->setRules($rule->text);
    }

    private function setAboutPageTitle($title)
    {
        $this->aboutPageTitle = $title;
    }
    private function setAboutPageText($text)
    {
        $this->aboutPageText= $text;
    }

    private function setAboutPagePic($pic)
    {
        $this->aboutPagePic = $pic;
    }
}