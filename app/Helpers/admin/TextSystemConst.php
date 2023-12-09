<?php

namespace App\Helpers\admin;

class TextSystemConst
{
    public const EMAIL_EXIST_SYSTEM = "Email đã tồn tại trong hệ thống";
    public const CHANGE_PASSWORD_SUCCESS = "Thay đổi mật khẩu thành công";
    public const PURCHASE_HISTORY = "Lịch Sử Mua Hàng";
    public const DELETE_SUCCESS = "Xóa thành công";
    public const DELETE_FAILED = "Xóa thất bại";
    public const SYSTEM_ERROR = "Có lỗi xảy ra vui lòng thử lại";
    public const CREATE_SUCCESS = "Thêm thành công";
    public const CREATE_FAILED = "Thêm thất bại hãy thử lại";
    public const UPDATE_SUCCESS = "Chỉnh sửa thông tin thành công";
    public const UPDATE_FAILED = "Chỉnh sửa thất bại hãy thử lại";
    public const CHANGE_PASSWORD = [
        'success' => 'Thay đổi mật khẩu thành công',
        'error' => 'Thực hiện thất bại vui lòng thử lại'
    ];
    public const ORDER_PROCESSING = "Xử lý đơn hàng thành công";
    public const ADD_CART_ERROR_QUANTITY = "Số lượng trong kho không đủ";
    public const MESS_ORDER_HISTORY = [
        'cancel' => "Bạn đã hủy đơn hàng thành công",
        'confirm' => "Bạn đã nhận hàng thành công",
        'delete' => "Bạn đã xóa đơn hàng thành công",
        'reorder' => "Bạn đã đặt lại đơn hàng thành công",
    ];
}
?>