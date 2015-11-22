<?php

namespace Http\Controller;

use App\Controller\MainController;

class UploadsController extends MainController
{

    public function __construct()
    {
        parent::__construct();
        $this->useModel('Upload');
    }

    public function index()
    {
        $this->render->layout('admin');
        $this->render->paramLayout(array('title_head' => 'Escolha o Upload'));

        $this->render->view('uploads/index.html');
    }


    public function images()
    {
        $this->render->layout('admin');
        $this->render->paramLayout(array(
            'title_head' => 'Upload de Imagens',
            'action' => '/uploads/upload_img/',
            'title_form' => 'Upload de Imagens'
        ));

        $this->render->view('uploads/img.php');
    }


    public function refresh_img()
    {
        $this->useModel('Files');
        $files = $this->Files->return_img_file();

        $this->render->view('uploads/loop_images.php', array('files' => $files));
    }


    public function docs()
    {
        $this->render->layout('admin');
        $this->render->paramLayout(array(
            'title_head' => 'Upload de Documentos',
            'action' => '/uploads/document_upload/',
            'title_form' => 'Upload de Documentos'
        ));

        $this->render->view('uploads/img.php');
    }

    public function upload_img()
    {
        $this->Upload->valid_images($_FILES['files']);
    }

    public function document_upload()
    {
        $this->Upload->valid_docs($_FILES['files']);
    }

}