<?php

resourcePermissions('المستخدمين', 'مستخدم', 'users.');
singlePermission('المستخدمين', 'قبول التحقق من مستخدم', 'users.verify');
singlePermission('المستخدمين', 'رفض التحقق من مستخدم', 'users.un-verify');
singlePermission('المستخدمين', 'تغيير حالة مستخدم', 'users.toggleBoolean.active');
singlePermission('المستخدمين', 'إضافة إلى محفظة مستخدم', 'users.add.to.wallet');
singlePermission('المستخدمين', 'المحفظة', 'users.wallet');
