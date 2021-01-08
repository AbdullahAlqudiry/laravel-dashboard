<?php

    return [
        'app_version' => '1.0',

        'web-service' => [
            'private_key' => 'app/rsa/private.key',
            'public_key' => 'app/rsa/public.key'
        ],

        'roles' => [
            'roles' => [
                ['guard_name' => 'web', 'name' => 'Admin', 'label' => 'مدير النظام'],
                ['guard_name' => 'web', 'name' => 'User', 'label' => 'مستخدم'],
            ],

            'permissions' => [
                // Web Guard
                // User/ProfileController
                ['guard_name' => 'web', 'group_key' => 'user_profile', 'name' => 'user.profile.show', 'label' => 'الملف الشخصي'],
                ['guard_name' => 'web', 'group_key' => 'user_profile', 'name' => 'user.profile.create', 'label' => 'تحديث الملف الشخصي'],

                // Dashboard/System/StatisticsController
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_statistics', 'name' => 'dashboard.system.statistics.show', 'label' => 'إحصائيات النظام'],

                // Dashboard/System/UsersController
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_users', 'name' => 'dashboard.system.users.show', 'label' => 'عرض المستخدمين'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_users', 'name' => 'dashboard.system.users.edit', 'label' => 'تعديل المستخدم'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_users', 'name' => 'dashboard.system.users.destroy', 'label' => 'حذف المستخدم'],

                // Dashboard/System/RolesController
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_roles', 'name' => 'dashboard.system.roles.show', 'label' => 'عرض الإدوار'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_roles', 'name' => 'dashboard.system.roles.create', 'label' => 'إنشاء دور جديد'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_roles', 'name' => 'dashboard.system.roles.edit', 'label' => 'تعديل الدور'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_roles', 'name' => 'dashboard.system.roles.destroy', 'label' => 'حذف الدور'],

                // Dashboard/System/WebServicesController
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_web-services', 'name' => 'dashboard.system.web-services.show', 'label' => 'Web Services'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_web-services', 'name' => 'dashboard.system.web-services.create', 'label' => 'Create Web Service'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_web-services', 'name' => 'dashboard.system.web-services.edit', 'label' => 'Edit Web Service'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_web-services', 'name' => 'dashboard.system.web-services.destroy', 'label' => 'Destroy Web Service'],

                // Dashboard/System/SettingsController
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_settings', 'name' => 'dashboard.system.settings.show', 'label' => 'عرض الإعدادات العامة'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_system_settings', 'name' => 'dashboard.system.settings.create', 'label' => 'تعديل الإعدادات العامة'],

                // Web Service Guard
                ['guard_name' => 'webService', 'group_key' => 'web_services_gateway_sms', 'name' => 'web-services.gateway.sms.create', 'label' => 'إرسال رسائل SMS'],
            ],
        ]
    ];
