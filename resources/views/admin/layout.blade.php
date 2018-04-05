@extends('admin.parent_layout')

@section('left-sider')
	<div id='left-sider-admin'>
		<ul>
			<li class='left-sider-admin-items'>
				<span>Chủ Đề</span>
				<ul>
					<li><a href="{{ url('/admin/add-category') }}">Thêm Chủ Đề</a></li>
					<li><a href="#">Xóa Chủ Đề</a></li>
					<li><a href="#">Sửa Chủ Đề</a></li>
					<li><a href="#">Cài Đặt</a></li>
				</ul>
			</li>
			<li class='left-sider-admin-items'>
				<span>Bài Viết</span>
				<ul>
					<li><a href="#">Thêm Bài Viết</a></li>
					<li><a href="#">Xóa Bài Viết</a></li>
					<li><a href="#">Sửa Bài Viết</a></li>
					<li><a href="#">Cài Đặt</a></li>
				</ul>
			</li>
			<li class='left-sider-admin-items'>
				<span>Bình Luận</span>
				<ul>
					<li><a href="#">Thêm Bình Luận</a></li>
					<li><a href="#">Xóa Bình Luận</a></li>
					<li><a href="#">Sửa Bình Luận</a></li>
				</ul>
			</li>
			<li class='left-sider-admin-items'>
				<span>Thành Viên</span>
				<ul>
					<li><a href="#">Thêm Thành Viên</a></li>
					<li><a href="#">Xóa Thành Viên</a></li>
					<li><a href="#">Sửa Thành Viên</a></li>
					<li><a href="#">Cài Đặt</a></li>
				</ul>
			</li>
			<li class='left-sider-admin-items'>
				<span><a href="#">Cài Đặt</a></span>
				
			</li>
		</ul>
	</div>
@endsection
