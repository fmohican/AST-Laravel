/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/pages/servers_index.js":
/*!*********************************************!*\
  !*** ./resources/js/pages/servers_index.js ***!
  \*********************************************/
/***/ (() => {

eval("function remove() {\n  $(document).on('click', '.btn-delete', function () {\n    var id = $(this).data('id');\n    Swal.fire({\n      title: 'Are you sure?',\n      text: 'This operation is irreversible, the server will be gone.',\n      icon: 'question',\n      showCancelButton: true,\n      confirmButtonColor: '#3085d6',\n      cancelButtonColor: '#d33',\n      confirmButtonText: 'Continue',\n      cancelButtonText: 'Abort'\n    }).then(function (response) {\n      if (response.isConfirmed) {\n        $.post(route('app.admin.server.delete'), {\n          _method: 'delete',\n          serverId: id\n        }).then(function (resp) {\n          if (resp.status === 200) {\n            Swal.fire({\n              title: 'Server was deleted!',\n              icon: 'success'\n            });\n            $('tr[data-id=\"' + id + '\"]').remove();\n          } else {\n            Swal.fire({\n              title: \"Something went wrong.\",\n              icon: 'error'\n            });\n          }\n        });\n      }\n    });\n  });\n}\n\nfunction ping() {\n  $(document).on('click', '.btn-ping', function () {\n    var id = $(this).data('id');\n    $.post(route('app.admin.server.check'), {\n      serverId: id\n    }).done(function (response) {\n      Swal.fire({\n        title: response.title,\n        icon: response.icon,\n        html: response.msg\n      });\n    });\n  });\n}\n\n$(document).ready(function () {\n  $(document).ajaxSend(function () {\n    Swal.showLoading();\n  });\n  remove();\n  ping();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcGFnZXMvc2VydmVyc19pbmRleC5qcz9jNzg3Il0sIm5hbWVzIjpbInJlbW92ZSIsIiQiLCJkb2N1bWVudCIsIm9uIiwiaWQiLCJkYXRhIiwiU3dhbCIsImZpcmUiLCJ0aXRsZSIsInRleHQiLCJpY29uIiwic2hvd0NhbmNlbEJ1dHRvbiIsImNvbmZpcm1CdXR0b25Db2xvciIsImNhbmNlbEJ1dHRvbkNvbG9yIiwiY29uZmlybUJ1dHRvblRleHQiLCJjYW5jZWxCdXR0b25UZXh0IiwidGhlbiIsInJlc3BvbnNlIiwiaXNDb25maXJtZWQiLCJwb3N0Iiwicm91dGUiLCJfbWV0aG9kIiwic2VydmVySWQiLCJyZXNwIiwic3RhdHVzIiwicGluZyIsImRvbmUiLCJodG1sIiwibXNnIiwicmVhZHkiLCJhamF4U2VuZCIsInNob3dMb2FkaW5nIl0sIm1hcHBpbmdzIjoiQUFBQSxTQUFTQSxNQUFULEdBQWtCO0FBQ2RDLEVBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEVBQVosQ0FBZSxPQUFmLEVBQXdCLGFBQXhCLEVBQXVDLFlBQVk7QUFDL0MsUUFBSUMsRUFBRSxHQUFHSCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLElBQVIsQ0FBYSxJQUFiLENBQVQ7QUFDQUMsSUFBQUEsSUFBSSxDQUFDQyxJQUFMLENBQVU7QUFDTkMsTUFBQUEsS0FBSyxFQUFFLGVBREQ7QUFFTkMsTUFBQUEsSUFBSSxFQUFFLDBEQUZBO0FBR05DLE1BQUFBLElBQUksRUFBRSxVQUhBO0FBSU5DLE1BQUFBLGdCQUFnQixFQUFFLElBSlo7QUFLTkMsTUFBQUEsa0JBQWtCLEVBQUUsU0FMZDtBQU1OQyxNQUFBQSxpQkFBaUIsRUFBRSxNQU5iO0FBT05DLE1BQUFBLGlCQUFpQixFQUFFLFVBUGI7QUFRTkMsTUFBQUEsZ0JBQWdCLEVBQUU7QUFSWixLQUFWLEVBU0dDLElBVEgsQ0FTUSxVQUFVQyxRQUFWLEVBQW9CO0FBQ3hCLFVBQUdBLFFBQVEsQ0FBQ0MsV0FBWixFQUF5QjtBQUNyQmpCLFFBQUFBLENBQUMsQ0FBQ2tCLElBQUYsQ0FBT0MsS0FBSyxDQUFDLHlCQUFELENBQVosRUFBeUM7QUFDckNDLFVBQUFBLE9BQU8sRUFBRSxRQUQ0QjtBQUVyQ0MsVUFBQUEsUUFBUSxFQUFFbEI7QUFGMkIsU0FBekMsRUFHR1ksSUFISCxDQUdRLFVBQVVPLElBQVYsRUFBZ0I7QUFDcEIsY0FBR0EsSUFBSSxDQUFDQyxNQUFMLEtBQWdCLEdBQW5CLEVBQXdCO0FBQ3BCbEIsWUFBQUEsSUFBSSxDQUFDQyxJQUFMLENBQVU7QUFDTkMsY0FBQUEsS0FBSyxFQUFFLHFCQUREO0FBRU5FLGNBQUFBLElBQUksRUFBRTtBQUZBLGFBQVY7QUFJQVQsWUFBQUEsQ0FBQyxDQUFDLGlCQUFlRyxFQUFmLEdBQWtCLElBQW5CLENBQUQsQ0FBMEJKLE1BQTFCO0FBQ0gsV0FORCxNQU9LO0FBQ0RNLFlBQUFBLElBQUksQ0FBQ0MsSUFBTCxDQUFVO0FBQ05DLGNBQUFBLEtBQUssRUFBRSx1QkFERDtBQUVORSxjQUFBQSxJQUFJLEVBQUU7QUFGQSxhQUFWO0FBSUg7QUFDSixTQWpCRDtBQWtCSDtBQUNKLEtBOUJEO0FBK0JILEdBakNEO0FBa0NIOztBQUVELFNBQVNlLElBQVQsR0FBZ0I7QUFDWnhCLEVBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEVBQVosQ0FBZSxPQUFmLEVBQXdCLFdBQXhCLEVBQXFDLFlBQVc7QUFDNUMsUUFBSUMsRUFBRSxHQUFHSCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLElBQVIsQ0FBYSxJQUFiLENBQVQ7QUFDQUosSUFBQUEsQ0FBQyxDQUFDa0IsSUFBRixDQUFPQyxLQUFLLENBQUMsd0JBQUQsQ0FBWixFQUF3QztBQUNwQ0UsTUFBQUEsUUFBUSxFQUFFbEI7QUFEMEIsS0FBeEMsRUFFR3NCLElBRkgsQ0FFUSxVQUFVVCxRQUFWLEVBQW9CO0FBQ3hCWCxNQUFBQSxJQUFJLENBQUNDLElBQUwsQ0FBVTtBQUNOQyxRQUFBQSxLQUFLLEVBQUVTLFFBQVEsQ0FBQ1QsS0FEVjtBQUVORSxRQUFBQSxJQUFJLEVBQUVPLFFBQVEsQ0FBQ1AsSUFGVDtBQUdOaUIsUUFBQUEsSUFBSSxFQUFFVixRQUFRLENBQUNXO0FBSFQsT0FBVjtBQUtILEtBUkQ7QUFTSCxHQVhEO0FBWUg7O0FBRUQzQixDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZMkIsS0FBWixDQUFrQixZQUFZO0FBQzFCNUIsRUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWTRCLFFBQVosQ0FBcUIsWUFBVTtBQUMzQnhCLElBQUFBLElBQUksQ0FBQ3lCLFdBQUw7QUFDSCxHQUZEO0FBR0EvQixFQUFBQSxNQUFNO0FBQ055QixFQUFBQSxJQUFJO0FBQ1AsQ0FORCIsInNvdXJjZXNDb250ZW50IjpbImZ1bmN0aW9uIHJlbW92ZSgpIHtcbiAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLmJ0bi1kZWxldGUnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGxldCBpZCA9ICQodGhpcykuZGF0YSgnaWQnKTtcbiAgICAgICAgU3dhbC5maXJlKHtcbiAgICAgICAgICAgIHRpdGxlOiAnQXJlIHlvdSBzdXJlPycsXG4gICAgICAgICAgICB0ZXh0OiAnVGhpcyBvcGVyYXRpb24gaXMgaXJyZXZlcnNpYmxlLCB0aGUgc2VydmVyIHdpbGwgYmUgZ29uZS4nLFxuICAgICAgICAgICAgaWNvbjogJ3F1ZXN0aW9uJyxcbiAgICAgICAgICAgIHNob3dDYW5jZWxCdXR0b246IHRydWUsXG4gICAgICAgICAgICBjb25maXJtQnV0dG9uQ29sb3I6ICcjMzA4NWQ2JyxcbiAgICAgICAgICAgIGNhbmNlbEJ1dHRvbkNvbG9yOiAnI2QzMycsXG4gICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogJ0NvbnRpbnVlJyxcbiAgICAgICAgICAgIGNhbmNlbEJ1dHRvblRleHQ6ICdBYm9ydCdcbiAgICAgICAgfSkudGhlbihmdW5jdGlvbiAocmVzcG9uc2UpIHtcbiAgICAgICAgICAgIGlmKHJlc3BvbnNlLmlzQ29uZmlybWVkKSB7XG4gICAgICAgICAgICAgICAgJC5wb3N0KHJvdXRlKCdhcHAuYWRtaW4uc2VydmVyLmRlbGV0ZScpLCB7XG4gICAgICAgICAgICAgICAgICAgIF9tZXRob2Q6ICdkZWxldGUnLFxuICAgICAgICAgICAgICAgICAgICBzZXJ2ZXJJZDogaWQsXG4gICAgICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbiAocmVzcCkge1xuICAgICAgICAgICAgICAgICAgICBpZihyZXNwLnN0YXR1cyA9PT0gMjAwKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiAnU2VydmVyIHdhcyBkZWxldGVkIScsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogJ3N1Y2Nlc3MnLFxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAkKCd0cltkYXRhLWlkPVwiJytpZCsnXCJdJykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBcIlNvbWV0aGluZyB3ZW50IHdyb25nLlwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGljb246ICdlcnJvcicsXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9KTtcbn1cblxuZnVuY3Rpb24gcGluZygpIHtcbiAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLmJ0bi1waW5nJywgZnVuY3Rpb24oKSB7XG4gICAgICAgIGxldCBpZCA9ICQodGhpcykuZGF0YSgnaWQnKTtcbiAgICAgICAgJC5wb3N0KHJvdXRlKCdhcHAuYWRtaW4uc2VydmVyLmNoZWNrJyksIHtcbiAgICAgICAgICAgIHNlcnZlcklkOiBpZCxcbiAgICAgICAgfSkuZG9uZShmdW5jdGlvbiAocmVzcG9uc2UpIHtcbiAgICAgICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICAgICAgdGl0bGU6IHJlc3BvbnNlLnRpdGxlLFxuICAgICAgICAgICAgICAgIGljb246IHJlc3BvbnNlLmljb24sXG4gICAgICAgICAgICAgICAgaHRtbDogcmVzcG9uc2UubXNnLFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH0pO1xufVxuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkuYWpheFNlbmQoZnVuY3Rpb24oKXtcbiAgICAgICAgU3dhbC5zaG93TG9hZGluZygpO1xuICAgIH0pO1xuICAgIHJlbW92ZSgpO1xuICAgIHBpbmcoKTtcbn0pO1xuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9wYWdlcy9zZXJ2ZXJzX2luZGV4LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/pages/servers_index.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/servers_index.js"]();
/******/ 	
/******/ })()
;