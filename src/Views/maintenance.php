<?php

use ASchm\Maintenance\Controllers\MaintenanceController;
use CodeIgniter\I18n\Time;

$status = MaintenanceController::status();
?>
<h3><?= lang('Admin.section.maintenance') ?></h3>
<div class="table maintenance">
	<div class="table-body">
		<div class="table-row">
			<div class="table-cell">
				<b><?= lang('Maintenance.status') ?></b>
			</div>
			<div class="table-cell highlight-<?= $status['offline'] ? 'error' : 'success' ?>">
				<?= lang('Maintenance.status' . ($status['offline'] ? 'Offline' : 'Online')) ?>
			</div>
		</div>

		<?php if ($status['offline']): ?>
			<div class="table-row">
				<div class="table-cell">
					<b><?= lang('Maintenance.offlineSince') ?></b>
				</div>
				<div class="table-cell">
					<?=
                            Time::createFromTimestamp($status['time'])
                            ->setTimezone(app_timezone())
                            ->toLocalizedString('dd.MM.yyyy, HH:mm:ss')
                    ?>
				</div>
			</div>
			<div class="table-row">
				<div class="table-cell">
					<b><?= lang('Maintenance.allowedGroups') ?></b>
				</div>
				<div class="table-cell">
					<?= implode(', ', $status['allowed_groups']) ?>
				</div>
			</div>
		<?php endif; ?>

		<?= form_open('Maintenance', ['id' => 'admin-maintenance-form', 'class' => 'table-row']) ?>
		<div class="table-cell"></div>
		<div class="table-cell buttons">
			<?=
            form_button(
                    [
                        'type'    => 'submit',
                        'name'    => 'action',
                        'value'   => $status['offline'] ? 'up' : 'down',
                        'content' => $status['offline'] ? lang('Maintenance.buttons.up') : lang('Maintenance.buttons.down'),
                        'class'   => '',
                    ]
            )
            ?>
		</div>
		<?= form_close() ?>
	</div>
</div>
