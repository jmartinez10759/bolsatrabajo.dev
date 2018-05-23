new Vue({
    el: ".vue_dashboard",
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
      offset: 5,
  
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
      }
    
    },
    mixins : [mixins],
    methods:{

      changePage( page ){
          this.pagination.current_page = page;
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
            console.log( this.datos );
  
          });
  
      }
  
    }
  
  });
  