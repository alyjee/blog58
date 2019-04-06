<?php
/********************Super Admin Breadcrumbs*************************/
Breadcrumbs::register('dashboard.index', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::register('dashboard.packages.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Packages', route('dashboard.packages.index'));
});

	Breadcrumbs::register('dashboard.packages.create', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.packages.index');
	    $breadcrumbs->push('Add Package', route('dashboard.packages.create'));
	});

	Breadcrumbs::register('dashboard.packages.edit', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.packages.index');
	    $breadcrumbs->push('Edit Hotel', route('dashboard.packages.edit', ['id'=>1]));
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

Breadcrumbs::register('dashboard.umrah.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Umrah Forms', route('dashboard.umrah.index'));
});

	Breadcrumbs::register('dashboard.umrah.create', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.umrah.index');
	    $breadcrumbs->push('Create New Proposal', route('dashboard.umrah.create'));
	});

	Breadcrumbs::register('dashboard.umrah.phase1.edit', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.umrah.index');
	    $breadcrumbs->push('Edit Proposal', route('dashboard.umrah.phase1.edit', ['id'=>1]));
	});

	Breadcrumbs::register('dashboard.umrah.phase1.print', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.umrah.index');
	    $breadcrumbs->push('Print Proposal', route('dashboard.umrah.phase1.print', ['id'=>1]));
	});

	Breadcrumbs::register('dashboard.umrah.phase2.create', function ($breadcrumbs) {
	    $breadcrumbs->parent('dashboard.umrah.index');
	    $breadcrumbs->push('Finalize Proposal', route('dashboard.umrah.phase2.create', ['id'=>1]));
	});

Breadcrumbs::register('dashboard.umrah.phase2.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Final Umrah Forms', route('dashboard.umrah.phase2.index'));
});

// Breadcrumbs::register('dashboard.rooms.index', function ($breadcrumbs) {
//     $breadcrumbs->parent('dashboard.index');
//     $breadcrumbs->push('Rooms', route('dashboard.rooms.index'));
// });

// 	Breadcrumbs::register('dashboard.rooms.create', function ($breadcrumbs) {
// 	    $breadcrumbs->parent('dashboard.rooms.index');
// 	    $breadcrumbs->push('Add Room', route('dashboard.rooms.create'));
// 	});

// 	Breadcrumbs::register('dashboard.rooms.edit', function ($breadcrumbs) {
// 	    $breadcrumbs->parent('dashboard.rooms.index');
// 	    $breadcrumbs->push('Edit Room', route('dashboard.rooms.edit', ['id'=>1]));
// 	});