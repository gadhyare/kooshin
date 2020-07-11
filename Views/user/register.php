<div class="container mt-5 col-xs-12 col-md-6 m-auto">
    <div class="card  ">
        <div class="card-header  text-white unique-color-dark font-weight-bold text-center p-1"> اضافة مستخدم جديد </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="form-group col-xs-12 col-md-6">
                    <label> اسم المستخدم</label>
                    <input type="text" name="user_name" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المستخدم الجديد">
                </div>
                <div class="form-group col-xs-12 col-md-6">
                    <label> بريد المستخدم</label>
                    <input type="email" name="email" class="form-control p-1  rounded-0" placeholder="someone@exmple.com">
                </div>
                <div class="form-group col-xs-12 col-md-6">
                    <label> كلمة مرور المستخدم </label>
                    <input type="password" name="password" class="form-control p-1  rounded-0" placeholder="****">
                </div>
                <div class="form-group col-xs-12 col-md-6">
                    <label> تأكد كلمة المرور</label>
                    <input type="password" name="confirm_password" class="form-control p-1  rounded-0" placeholder="****">
                </div>
                <div class="form-group col-xs-12 col-md-6">
                    <label> الدرجة </label>
                    <select name="role" id="" class="form-control p-1  rounded-0">
                        <option value="manager">مدير</option>
                        <option value="finance"> محاسب </option>
                        <option value="admin"> الشؤون الإدارية </option>
                        <option value="students_Affairs"> شؤون الطلاب </option>
                        <option value="student"> طالب </option>
                    </select>
                </div>
                <div class="form-group col-xs-12 col-md-6">
                    <label> حالة المستخدم</label>
                    <select name="active" id="" class="form-control p-1  rounded-0">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
                </div>                
            </div>
                <input type="submit" name="submit" value="اضافة" class="btn btn-primary text-light px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/user" class="btn btn-danger text-light p-2">إلغاء</a>
            </form>
        </div>
    </div>
</div>