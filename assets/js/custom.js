function loader(command, message)
{
  if(command == 'show')
  {
    $('.loader').show();
  }
  else
  {
    setTimeout(function(){

    $('.loader').fadeOut();

    },500);
  }
}