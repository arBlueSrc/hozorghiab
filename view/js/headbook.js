function Marriage(a,b,c,d,e)
{
	var ans = (a+b+c+d)%5;
	if(ans == 0)
		ans = 5;
	return ans;
}