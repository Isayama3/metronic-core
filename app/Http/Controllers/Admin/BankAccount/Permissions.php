<?php

resourcePermissions('الحسابات البنكية', 'الحساب البنكي', 'bank-accounts.');
singlePermission('الحسابات البنكية', 'تفعيل حساب بنكي', 'bank-accounts.toggleBoolean.active');

resourcePermissions('معاملات الحسابات البنكية', 'معاملة الحساب البنكي', 'bank-account-transactions.');
resourcePermissions('طلبات إيداع الوكلاء', 'طلب إيداع الوكيل', 'agent-bank-account-transactions.');
