new Vue({
    el: "#vue_section_jobs",
    created: function () {
      this.consulta_general();
    },
    data: {
      datos: [],
      pagination: {
         'total': 0
        ,'current_page': 0
        ,'per_page': 0
        ,'last_page': 0
        ,'from': 0
        ,'to': 0
      },
      newKeep: {
       'name':""
       ,'title':""
       ,'data':""
      },
      fillKeep: {
        'name':""
       ,'title':""
       ,'data':""
      },
      offset: 5

    },
    computed: {
      isActived: function() { return this.pagination.current_page; },
      pagesNumber: function() {
        if(!this.pagination.to){
          return [];
        }
        var from = this.pagination.current_page - this.offset;
        if(from < 1){
          from = 1;
        }
        var to = from + (this.offset * 2);
        if(to >= this.pagination.last_page){
          to = this.pagination.last_page;
        }
        var pagesArray = [];
        while(from <= to){
          pagesArray.push(from);
          from++;
        }
        return pagesArray;
      },
    },
    mixins : [mixins],
    methods:{

      changePage( page ){
          this.pagination.current_page = page;
          var url = domain('dashboard/show');
          var fields = {'page': page};
          this.get_general( url,fields );

      },
      changePageDetalle( page ){
          this.pagination_detalles.current_page = page;
          var url = domain('dashboard/show');
          var fields = {'page': page};
          this.get_general( url,fields );

      },
      consulta_general: function(){
          var url = domain('dashboard/show');
          var fields = {};
          axios.get(url,fields).then( response => {
            this.datos = response.data.result;
            this.pagination = response.data.result.pagination;
            //this.pagination_detalles = response.data.result.pagination_detalles;
            console.log( this.datos );

          });

      }

    }

  });


new Vue({
      el: "#vue_section_detalle",
      created: function () {
        this.consulta_general_detalle();
      },
      data: {
        datos: [],
        pagination_detalles: {
           'total': 0
          ,'current_page': 0
          ,'per_page': 0
          ,'last_page': 0
          ,'from': 0
          ,'to': 0
        },
        newKeep: {},
        fillKeep: {},
        offset: 4

      },
      computed: {
        isActiveded: function() { return this.pagination_detalles.current_page; },
        pagesNumberDetalle: function() {
          if(!this.pagination_detalles.to){
            return [];
          }
          var from = this.pagination_detalles.current_page - this.offset;
          if(from < 1){
            from = 1;
          }
          var to = from + (this.offset * 2);
          if(to >= this.pagination_detalles.last_page){
            to = this.pagination_detalles.last_page;
          }
          var pagesArray = [];
          while(from <= to){
            pagesArray.push(from);
            from++;
          }
          return pagesArray;
        }
      },
      mixins : [mixins],
      methods:{

        changePageDetalle( page ){
            this.pagination_detalles.current_page = page;
            var url = domain('dashboard/show');
            var fields = {'page': page};
            this.get_general( url,fields );

        },
        consulta_general_detalle: function(){
            var url = domain('dashboard/show');
            var fields = {};
            axios.get(url,fields).then( response => {
              this.datos = response.data.result;
              //this.pagination = response.data.result.pagination;
              this.pagination_detalles = response.data.result.pagination_detalles;
              console.log( this.datos );

            });

        }

      }

    });
