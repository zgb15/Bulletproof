! function(e) { "function" == typeof define && define.amd ? define(["jquery", "moment"], e) : "object" == typeof exports ? module.exports = e(require("jquery"), require("moment")) : e(jQuery, moment) }(function(e, a) {
    ! function() {
        a.defineLocale("es-es", {
            months: "Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Setiembre_Octubre_Noviembre_Diciembre".split("_"),
            monthsShort: "ene_feb_mar_abr_may_jun_jul_ago_set_oct_nov_dic".split("_"),
            weekdays: "Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sábado".split("_"),
            weekdaysShort: "Dom_Lun_Mar_Miér_Jue_Vie_Sáb".split("_"),
            weekdaysMin: "Do_2ª_3ª_4ª_5ª_6ª_Sá".split("_"),
            weekdaysParseExact: !0,
            longDateFormat: {
                LT: "HH:mm",
                LTS: "HH:mm:ss",
                L: "DD/MM/YYYY",
                LL: "D [de] MMMM [de] YYYY",
                LLL: "D [de] MMMM [de] YYYY [às] HH:mm",
                LLLL: "dddd, D [de] MMMM [de] YYYY [às] HH:mm"
            },
            calendar: {
                sameDay: "[Hoje às] LT",
                nextDay: "[Amanhã às] LT",
                nextWeek: "dddd [às] LT",
                lastDay: "[Ontem às] LT",
                lastWeek: function() { return 0 === this.day() || 6 === this.day() ? "[Último] dddd [às] LT" : "[Última] dddd [às] LT" },
                sameElse: "L"
            },
            relativeTime: {
                future: "em %s",
                past: "%s atrás",
                s: "pocos segundos",
                ss: "%d segundos",
                m: "un minuto",
                mm: "%d minutos",
                h: "una hora",
                hh: "%d horas",
                d: "un dia",
                dd: "%d dias",
                M: "un mes",
                MM: "%d meses",
                y: "un ano",
                yy: "%d anos"
            },
            dayOfMonthOrdinalParse: /\d{1,2}º/,
            ordinal: "%dº"
        })
    }(),
    e.fullCalendar.datepickerLocale("es-es", "es-ES", {
            closeText: "Fechar",
            prevText: "&#x3C;Anterior",
            nextText: "Próximo&#x3E;",
            currentText: "Hoy",
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"],
            dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sáb"],
            dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sáb"],
            weekHeader: "Sm",
            dateFormat: "dd/mm/yy",
            firstDay: 0,
            isRTL: !1,
            showMonthAfterYear: !1,
            yearSuffix: ""
        }),
        e.fullCalendar.locale("es-es", { buttonText: { month: "Mes", week: "Semana", day: "Día", list: "Compromisos" }, allDayText: "Día entero", eventLimitText: function(e) { return "mas +" + e }, noEventsMessage: "No hay eventos para mostrar" })
});