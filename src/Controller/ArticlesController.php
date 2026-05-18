<?php
declare(strict_types=1);

namespace App\Controller;

class ArticlesController extends AppController
{
    public function index(): void
    {
        $articles = $this->Articles->find('all')
            ->where(['published' => true])
            ->orderBy(['created' => 'DESC']);

        $this->set(compact('articles'));
    }

    public function view(?string $slug = null): void
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->firstOrFail();

        $this->set(compact('article'));
    }

    public function add(): void
    {
        $article = $this->Articles->newEmptyEntity();

        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity(
                $article,
                $this->request->getData()
            );

            if ($this->Articles->save($article)) {
                $this->Flash->success('Artículo guardado correctamente.');
                $this->redirect(['action' => 'index']);
                return;
            }

            $this->Flash->error('No se pudo guardar el artículo.');
        }

        $this->set(compact('article'));
    }
}