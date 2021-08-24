<?php

namespace App\Tables;

use App\Models\Mensalidade;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class MensalidadesTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Mensalidade::class)
            ->routes([
                'index'   => ['name' => 'mensalidades.index'],
                'create'  => ['name' => 'mensalidades.create'],
                'edit'    => ['name' => 'mensalidades.edit'],
                'destroy' => ['name' => 'mensalidades.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Mensalidade $mensalidade) => [
                'data-confirm' => __('Are you sure you want to delete the line ' . $mensalidade->id . ' ?'),
            ]);
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('matricula')->title('Aluno')->sortable(true)->value(fn(Mensalidade $mensalidade) => $mensalidade->matricula->aluno->nome);
        $table->column('valor')->sortable()->searchable();
        $table->column('mes')->sortable()->searchable();
        $table->column('ano')->sortable()->searchable();
        $table->column('status')->sortable()->searchable();
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
    }
}
