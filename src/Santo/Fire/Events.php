<?php

return [
	'plan.create' => \Events\PlanCreate::class,
	'plan.canceled' => \Events\PaymentCanceled::class,
	'plan.experimental' => \Events\ExperimentalPlan::class,
	'plan.active' => \Events\PlanActive::class,
	'plan.bloqued' => \Events\PlanBloqued::class,
	'plan.delete'  => \Events\PlanDelete::class,
	'plan.end_date' => \Events\PlanEndDate::class,
	'plan.undetermined' => \Events\PlanUndetermined::class,
	'plan.unbloqued.paused' => \Events\Unblock\Paused::class,
	'plan.unbloqued.undetermined' => \Events\Unblock\Undetermined::class,
	'payment.create' => \Events\PaymentCreate::class,
	'payment.create.check' => \Events\PaymentCheck::class,
	'schedule.down' => \Events\Schedule\Down::class,
	'schedule.create' => \Events\Schedule\Create::class,
	'schedule.update' => \Events\Schedule\Update::class,
	
];