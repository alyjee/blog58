<?php
/********************Super Admin Breadcrumbs*************************/
Breadcrumbs::register('dashboard.index', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::register('dashboard.hotels.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Hotels', route('dashboard.hotels.index'));
});

	Breadcrumbs::register('dashboard.hotels.create', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.hotels.index');
	    $breadcrumbs->push('Add Hotel', route('dashboard.hotels.create'));
	});

	Breadcrumbs::register('dashboard.hotels.edit', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.hotels.index');
	    $breadcrumbs->push('Edit Hotel', route('dashboard.hotels.edit', ['id'=>1]));
	});

Breadcrumbs::register('dashboard.rooms.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Rooms', route('dashboard.rooms.index'));
});

	Breadcrumbs::register('dashboard.rooms.create', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.rooms.index');
	    $breadcrumbs->push('Add Room', route('dashboard.rooms.create'));
	});

	Breadcrumbs::register('dashboard.rooms.edit', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.rooms.index');
	    $breadcrumbs->push('Edit Room', route('dashboard.rooms.edit', ['id'=>1]));
	});