var config = {
    paths: {
        slick: 'js/slick.min'
    },
    shim: {
        slick: {
            deps: ['jquery']
        }
    }
};
// shim cau hinh cac thanh phan phu thuoc
// shim:{
//        moduleA:{
//          deps:['moduleB']
//         }
//     }
//
// })
// ==> module B luon dc tai trc module A
