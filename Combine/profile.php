<!DOCTYPE html>
<style>
    .fieldset.container {
        position: relative;
        left: 100px;
        top: 100px;
    }
</style>

<form action="profile.php" method="post">
<div class="fieldset container">
    <h2 class="icon-mobile">Account details</h2>
    <div class="field" data-addclass-invalid="employee.errors.name.length">
        <label>Name</label><br>
        <input data-bind="employee.name" name="name" type="text">
        <ul class="errors" data-showif="employee.errors.name.length" style="display: none !important;">
            <!--batman-iterator-error="employee.errors.name"-->
        </ul></div>
    <div class="field">
        <label>Email</label>
        <div class="input-prepend icon-mail" data-addclass-invalid="employee.errors.email.length">
            <input data-bind="employee.email" name="email" type="email">
            <ul class="errors" data-showif="employee.errors.email.length" style="display: none !important;">
                <!--batman-iterator-error="employee.errors.email"-->
            </ul></div>
    </div>
    <div class="field">
        <label>Password</label>
        <div class="input-prepend icon-lock" data-addclass-invalid="employee.errors.password.length">
            <input data-bind="employee.password" name="password" type="password">
            <ul class="errors" data-showif="employee.errors.password.length" style="display: none !important;">
                <!--batman-iterator-error="employee.errors.password"-->
            </ul></div>
    </div>
    <div class="field">
        <label>Confirm password</label>
        <div class="input-prepend icon-lock" data-addclass-invalid="employee.errors.password_confirmation.length">
            <input data-bind="employee.password_confirmation" name="password" type="password">
            <ul class="errors" data-showif="employee.errors.password_confirmation.length" style="display: none !important;">
                <!--batman-iterator-error="employee.errors.password_confirmation"-->
            </ul></div>
    </div>
    <br><br>
    <input type="submit" name="submit" >


</div>
<?php
include("sidebar.php");
include("config.php");
?>