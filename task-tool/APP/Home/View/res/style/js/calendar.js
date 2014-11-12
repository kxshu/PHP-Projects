var calendar = (function () {

            var _default_string = {
                id: 'commonCalendar',
            }

            // 创建DOM
            var _creatDom = function (_public_string) {
                var id = _getCalendarId(),
                    date = _getCurDate(),
                    dateDom = _getDateDom(date);
                
                var html = $('<div id="' + id + '" class="commonCalendar ' + _public_string.className + '">' +
                                '<div class="c_title">' +
                                    '<div class="c_preN" id="c_preN"></div>' +
                                    '<div class="c_time" id="c_year">'+date.year+'年</div>' +
                                    '<div class="c_nextN" id="c_nextN"></div>' +
									'<div class="c_next" id="c_next"></div>' +
                                    '<div class="c_time pull-right" id="c_month">'+(date.month+1)+'月</div>' +
                                    '<div class="c_pre" id="c_pre"></div>' +
                                '</div>' +
                                '<table class="c_table" id="c_table">' +
                                    dateDom +
                                '</table>' +
                            '</div>');

                _calendar.id = id;  // 赋值ID
                _calendar.me = html;    // 赋值me
                _calendar.curDate = date;

                return html;
            }
            // 获取日历ID
            var _getCalendarId = function () {
                return _default_string.id + '_' + new Date().getTime();
            }
            // 获取当前时间
            var _getCurDate = function () {
                var date = new Date();
                
                var time = {
                    year: date.getFullYear(),
                    month: date.getMonth(),
                    day: date.getDate(),
                    hour: date.getHours(),
                    minute: date.getMinutes(),
                    second: date.getSeconds()
                };

                date.setDate(1);
                time.weekday = date.getDay();
                time.countDay = _getDayByYearMonth(time.year, time.month+1);
                return time;
            }
            // 获取当月天数
            var _getDayByYearMonth = function (year, month) {
                var day = 0;
                if (month == 2) {
                    var isRn = false;
                    if ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) {
                        isRn = true;
                    }
                    if (isRn) {
                        day = 29;
                    } else {
                        day = 28;
                    }
                }
                else if (month == 4 || month == 6 || month == 9 || month == 11) {
                    day = 30;
                }
                else {
                    day = 31;
                }

                return day;
            }
            // 获取时间DOM
            var _getDateDom = function (date) {
                var time = _getCurDate();
                var html = [
                            '<tr class="c_th c_tr">',
                                '<td class="c_td">日</td>',
                                '<td class="c_td">一</td>',
                                '<td class="c_td">二</td>',
                                '<td class="c_td">三</td>',
                                '<td class="c_td">四</td>',
                                '<td class="c_td">五</td>',
                                '<td class="c_td">六</td>',
                            '</tr>',
                            '<tr class="c_tr">'
                            ];
                for (var i = 1, len = date.countDay + date.weekday, isCurDay = false; i <= len; i++) {
                    if (i <= date.weekday) {
                        html.push('<td class="c_td c_none"></td>');
                    } else {
                        day = i - date.weekday;
                        if (day == date.day && date.month == time.month && date.year == time.year) {
                            isCurDay = true;
                        }
                        if (i % 7 == 0) {
                            html.push('<td class="c_td ' + (isCurDay ? "c_curDay" : "") + '" _num="' + day + '" title="' + date.year + '-' + (date.month + 1) + '-' + day + '">' + day + '</td></tr><tr class="c_tr">');
                        } else {
                            html.push('<td class="c_td ' + (isCurDay ? "c_curDay" : "") + '" _num="' + day + '" title="' + date.year + '-' + ((date.month + 1)) + '-' + day + '">' + day + '</td>');
                        }
                    }
                    isCurDay = false;
                }
                
                var tdNum = 7 - ((date.countDay + date.weekday) % 7 == 0 ? 7 : ((date.countDay + date.weekday) % 7));
                for (var i = 0; i < tdNum; i++) {
                    html.push('<td class="c_td c_none"></td>');
                }
                html.push('</tr>');

                return html.join('');
            }
            // 绑定事件
            var _bindEvent = function (_public_string) {
                var c_pre = $('#c_pre'),
                    c_next = $('#c_next'),
					c_preN = $('#c_preN'),
                    c_nextN = $('#c_nextN'),
                    c_table = $('#c_table'),
                    c_curDate = $('#c_curDate'),
                    c_close = $('#c_close');
                    
				// 上一年
                c_preN.click(function () {

                    var date = _calendar.curDate;
                    date.year -= 1;
                    
                    date.countDay = _getDayByYearMonth(date.year, date.month + 1);
                    date.weekday = _getWeek(date.year, date.month+1, 1);
                    _calendar.curDate = date;

                    _updateDom(date);
                });
				
				// 下一年
                c_nextN.click(function () {

                    var date = _calendar.curDate;
                    date.year += 1;

                    date.countDay = _getDayByYearMonth(date.year, date.month + 1);
                    date.weekday = _getWeek(date.year, date.month + 1, 1);
                    _calendar.curDate = date;

                    _updateDom(date);

                });

                // 上一月
                c_pre.click(function () {

                    var date = _calendar.curDate;
                    date.month -= 1;
                    if(date.month <= 0){
                        date.month = 11;
                        date.year -= 1;
                    }
                    
                    date.countDay = _getDayByYearMonth(date.year, date.month + 1);
                    date.weekday = _getWeek(date.year, date.month+1, 1);
                    _calendar.curDate = date;

                    _updateDom(date);
                });

                // 下一月
                c_next.click(function () {

                    var date = _calendar.curDate;
                    date.month += 1;
                    if (date.month > 11) {
                        date.month = 0;
                        date.year += 1;
                    }

                    date.countDay = _getDayByYearMonth(date.year, date.month + 1);
                    date.weekday = _getWeek(date.year, date.month + 1, 1);
                    _calendar.curDate = date;

                    _updateDom(date);

                });

                // 选择日期
                $('#c_table').click(function (e) {
                    e = $(e.target);
                    var newDate = _getCurDate();
                    if (e[0].tagName.toLocaleLowerCase() == 'td' && typeof e.attr('_num') != 'undefined') {

                        newDate.year = _calendar.curDate.year;
                        newDate.month = _calendar.curDate.month;
                        newDate.day = e.attr('_num');
						
						$('#c_table .c_curDay').removeClass('c_curDay');
						e.addClass('c_curDay');
						
                        _calendar.curDate = newDate;
                    }
                });

                c_pre = c_next = c_table = c_curDate = c_ok = null;
            }
            // 更新DOM
            var _updateDom = function (date) {
                var c_table = $('#c_table'),
                	c_year = $('#c_year'),
                	c_month = $('#c_month'),
                    dom = _getDateDom(date);
				
				c_year.html(date.year + '年');
				c_month.html(date.month + 1 + '月');
                c_table.html(dom);
            }
            // 获取星期数
            var  _getWeek = function(y, m, d) {
                var _int = parseInt,
                    c = _int(y / 100);
                y = y.toString().substring(2, 4);
                y = _int(y, 10);
                if (m === 1) {
                    m = 13;
                    y--;
                } else if (m === 2) {
                    m = 14;
                    y--;
                };

                var w = y + _int(y / 4) + _int(c / 4) - 2 * c + _int(26 * (m + 1) / 10) + d - 1;
                w = w % 7;

                return w >= 0 ? w : w + 7;
            }
            
            var _calendar = {
                id: 0,
                me: null,
                curDate: null,
                targetEl: null,
                init: function (param) {

                    var _public_string = {
                        className: 'commonCalendarDefault',
                        setVal: null,    // 设置值
                        format: function (date) {   // 时间格式器
                            return date.year + '-' + date.month + '-' + date.day + ' ' + date.hour + ':' + date.minute + ':' + date.second;
                        },
                        toEl: 'body'
                    };

                    _public_string = $.extend(_public_string, param);

                    var o = _creatDom(_public_string);
                    $(o).appendTo(_public_string.toEl);

                    _bindEvent(_public_string);
					
					return this;
                },
                getSelectedDate: function(){
                	
                	var rs = null,
                		curEl = $('#c_table .c_curDay');
                	if(this.curDate && curEl.length > 0){
                		rs = this.curDate;
                	}
                	return rs;
                }
            };

            return _calendar;

        });