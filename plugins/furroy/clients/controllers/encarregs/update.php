<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('furroy/clients/encarregs') ?>">Encarregs</a></li>
        <li><?= e($this->pageTitle) ?></li>
    </ul>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <?= Form::open(['class' => 'layout']) ?>

        <div class="layout-row">
            <?= $this->formRender() ?>
        </div>

        <div class="form-buttons">
            <div class="loading-indicator-container">
                <button
                    type="submit"
                    data-request="onSave"
                    data-request-data="redirect:0"
                    data-hotkey="ctrl+s, cmd+s"
                    data-load-indicator="<?= e(trans('backend::lang.form.saving')) ?>"
                    class="btn btn-primary">
                    <?= e(trans('backend::lang.form.save')) ?>
                </button>

                <button
                    type="button"
                    data-request="onSave"
                    data-request-data="close:1"
                    data-hotkey="ctrl+enter, cmd+enter"
                    data-load-indicator="<?= e(trans('backend::lang.form.saving')) ?>"
                    class="btn btn-default">
                    <?= e(trans('backend::lang.form.save_and_close')) ?>
                </button>

                <!-- BOTÓN: Enviar correo al cliente -->
                <button
                    type="button"
                    class="btn btn-info"
                    data-control="popup"
                    data-handler="onLoadSendMailForm"
                    data-size="large"
                    data-request-data="id: <?= $formModel->id ?>"
                    style="margin-left: 10px;">
                    Formulari Encàrregs
                </button>

                <button
                    type="button"
                    class="oc-icon-trash-o btn-icon danger pull-right"
                    data-request="onDelete"
                    data-load-indicator="<?= e(trans('backend::lang.form.deleting')) ?>"
                    data-request-confirm="<?= e(trans('backend::lang.form.confirm_delete')) ?>">
                </button>

                <span class="btn-text" style="margin-left: 10px;">
                    <?= e(trans('backend::lang.form.or')) ?> <a href="<?= Backend::url('furroy/clients/encarregs') ?>"><?= e(trans('backend::lang.form.cancel')) ?></a>
                </span>
            </div>
        </div>

    <?= Form::close() ?>

<?php else: ?>
    <p class="flash-message static error"><?= e(trans($this->fatalError)) ?></p>
    <p><a href="<?= Backend::url('furroy/clients/encarregs') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')) ?></a></p>
<?php endif ?>
