#include "stdio.h"
#include "math.h"
#include "string.h"
#include "malloc.h"

#define		ln2					log(2)
#define		NumberOfAttribute	16
								//bat dau tu job - ket thuc class
int		KindOfAttribute[12] =	{ 6, 3, 3, 4, 4, 4, 5, 2, 3, 2, 2, 3 };
int		IsContinous[16]		=	{ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1};


// define Muc do rui ro - class attribute
#define HighRisk	1
#define MediumRisk	2
#define LowRisk		3

// define Job attribute
#define Job_ProfessionManagement		6
#define Job_TechncalEmployee			5
#define Job_OfficeStaff					4
#define Job_Student						3
#define Job_Worker						2
#define Job_PartTime					1


// define House status
#define House_Private				1
#define House_Rent					2
#define House_WithFamily			3

// define Muc do rui ro - class attribute
#define HighRisk	1
#define MediumRisk	2
#define LowRisk		3

// define Credit quality
#define Credit_Good			4
#define Credit_Medium		3
#define Credit_NotGood		2
#define Credit_Poor			1

// define Banking Account
#define BankingAccount_Saving_Currnet			4
#define Education_Saving						3
#define Education_Current						2
#define Education_None							1


// define Education level
#define Education_THPT			4
#define Education_TrungCap		3
#define Education_CaoDang		2
#define Education_DaiHoc		1

// define Dependent Number - so nguoi phu thuoc
#define Dependant_OnePerson			5
#define Dependant_TwoPeople			4
#define Dependant_ThreePeople		3
#define Dependant_FourPeople		2
#define Dependant_AboveFourPeople	1

//define Land line
#define LandLine_Yes		1
#define LandLine_No			2

//define Work Experience
#define WorkExperience_OneTwo		1
#define WorkExperience_ThreeFive	2
#define WorkExperience_AboveFive	3

// define Living Time
#define Living_TwoYear			1
#define Living_AboveTwoYear		2

// define Marriage
#define Marriage_Yes	1
#define Marriage_No		2



typedef struct _Human
{
	
	// concrete attribute
	int		dwClass;
	int		dwJob;
	int		dwHousingStatus;
	int		dwCreditQuality;
	int		dwBankingAccout;
	int		dwEducationLevel;		// 1: TN THPT 
									// 2: Trung cap
									// 3: Cao Dang
									// 4: Dai Hoc 
	int		dwDependentNumber;	
	bool	dwLandLine;
	int		dwWorkExperience;		// 1: 1-2 nam
									// 2: 3-5 nam
									// 3: tren 5 nam

	int		dwLivingTime;			// 1: 2 nam
									// 2: tren 2 nam

	bool	IsMarriage;				// 0: chua
									// 1: co 
	// continous attribute
	
	int		dwMoneyOwned;			// tai san so huu - lam tron theo trieu dong - VD: 50 tr, 150 tr, 200 tr
	int		dwIncome;				// thu nhap hang thang - lam tron theo tram nghin - VD: 2tr300 -> 2,3 tr
	int		dwOutCome;				// chi hang thang - lam tron theo tram nghin - VD: 2tr300 -> 2.3 trieu
	int		dwAge;					// tuoi
}Human;
typedef struct _Node
{
	int		AttributeOrder;		//thuoc tinh dung de test o node nay
	bool	IsLeaf;
	Node	*FatherNode;
	
	BYTE	*SubNode;
	int		Number_of_SubNode;

	bool	IsContionous;
	int		Moc;
}Node;
typedef struct _Tree
{
	Node	*root;
	int		dwLeafNumber;
	int		dwNonLeafNumber;
}Tree;
double CalcInfo(Human[] HumanTable)
{
	int		dem[10], i;
	double		info, temp;
	// để tính Info() tương ứng với 1 bảng HumanTable cần: 
	// |S| = số thuộc tính trong bảng HumanTable

	// gọi số bảng ghi có giá trị thuộc tính Class = Ci trong bảng HumanTable là Hi (i = 1,2,3: tương ứng với 3 độ rủi ro)
	// --> tính Hi

	
	// --> tính pi = Hi/|S|
	
	
	// --> tính qi = -log(pi) --> log ở đây là loga cơ số 2

	// info = p1*q1 + p2*q2 + p3*q3
	return info;
	
}
double CalcInfoX(Human[] HumanTable, int AttributeOrdinal)
{
	//tính InfoX tương ứng với thuộc tính AttributeOrdinal: 
	double	infoX = 0;
	
	// giả sử tập giá trị của thuộc tính AttributeOrdinal (rời rạc) có n giá trị 
	// chia bảng HumanTable thành n bảng T1, T2, ..., Tn ứng với n giá trị của thuộc tính AttributeOrdinal
	// với mỗi bảng con Ti ta tính: 
	//	--> p(i)	= |Ti|/|T|


	//	tính giá tri info(i) tương ứng với bảng Ti 
	//	--> info(i) = CalcInfo(Ti)

	
	//  --> tam(i)	= p(i) * info(i)


	//  --> InfoX	= tổng tất cả các tam(i) - (i = 1,...,n)
	return infoX;

}
double CalcGain(Human[] HumanTable, int OutcomeOfAttribute)
{
	// để tính Gain(X) ứng với thuộc tính X và bảng HumanTable ta cần: 
	double	Gain, Info, InfoX;
	int		i, LoaiAttribute;
	LoaiAttribute = 0;
	// --> tính Info(HumanTable) tương ứng với bảng HumanTable
	Info	= CalcInfo(HumanTable);
	
	// --> tính InfoX(HumanTable, AttributeOrdinal) ứng với thuộc tính X và bảng HumanTable
	InfoX	= CalcInfoX(HumanTable, OutcomeOfAttribute);

	// --> Gain = Info - InfoX
	Gain	= Info - InfoX;
	return	Gain;
}
double CalcSplitInfo(Human[] HumanTable, int AttributeOrdinal)
{
	// tính giá trị SplitInfo
	double SplitInfo = 0;
	// chia bảng HumanTable thành n bảng T1, T2, ..., Tn ứng với n giá trị của thuộc tính AttributeOrdinal
	// |Ti| = số record trong bảng Ti
	// với mỗi bảng con Ti ta tính: 
	// --> p(i)		= |Ti|/|T|

	// --> tam(i)	= -p(i) * log(p(i)) --> log là loga cơ số 2

	//SplitInfo = tổng tất cả các tam(i) - i = 1,...n

	return SplitInfo;
}
double CalcGainRatio(Human[] HumanTable, int AttributeOrdinal)
{
	// để tính GainRatio(X) ứng với mỗi thuộc tính X ta cần: 
	
	double GainRatio	= 0;
	double Gain			= 0;
	double SplitInfo	= 0;
	// nếu thuộc tính là rời rạc
		// --> tính Gain(X) ứng với thuộc tính X và bảng Human
		Gain = CalcGain(HumanTable, AttributeOrdinal);

		// --> tính SplitInfo(X) ứng với thuộc tính X và bảng Human
		SplitInfo = CalcSplitInfo(HumanTable, AttributeOrdinal);

		// --> GainRatio(X) = Gain(X)/SplitInfo(X);
		GainRatio = Gain/SplitInfo;

	//nếu thuộc tính là liên tục
		//
	return GainRatio;
}
int BuildTree(Human[] HumanTable, int HumanInTableNumber, Node* CurrentNode)
{
	int		MaxGainCriterion	= 0;
	int		MaxAttributeOrdinal = 0;
	Human	HumanTableTemp[100];

	//Kiểm tra giá trị thuộc tính class trong bảng HumanTable
	if (CheckClass(HumanTable, HumanInTableNumber) == 1) 
	{
		//	nếu tat ca cac ban ghi deu chung 1 class
		//	--> add tat ca vao 1 node
		//	--> gan node nay la Leaf
		return 1;
	}
	else 
	{
		int		i;
		//	Xét tất cả các thuộc tính trong bảng Human (bao gồm cả thuộc tính rời rạc, liên tục, không xác định)
		//	tính giá trị GainRatio ứng với mỗi thuộc tính
		//	chọn ra thuộc tính có GainRatio lớn nhất
		//	thuộc tính đó sẽ được dùng để 
		//		--> chia bảng Human
		//		--> và thêm điều kiện vào node
		for (i=1; i<=NumberOfAttribute; i++)
		{
			if (MaxGainCriterion < CalcGainRatio(i))
			{
				MaxGainCriterion	= CalcGainRatio(i);
				MaxAttributeOrdinal = i;
			}
		}
		// tạo node tương ứng với thuộc tính vừa tìm được - node này được đánh dấu không phải là node lá
		CurrentNode = (Node*) malloc(sizeof(Node));
		CurrentNode->AttributeOrder		= MaxAttributeOrdinal;
		CurrentNode->Number_of_SubNode	= KindOfAttribute[CurrentNode->AttributeOrder];


		// nếu thuộc tính vừa chọn là thuộc tính rời rạc
		if (IsContinous[MaxAttributeOrdinal] == 0)
		{
			CurrentNode->Moc				= -1;
			CurrentNode->IsContionous		= false;
			// số node con của node này = tập giá trị của thuộc tính vừa tìm được

			// chia bảng HumanTable thành n bảng T1, T2, ..., Tn ứng với n giá trị của thuộc tính vừa tìm được
			// gọi đệ quy theo BuildTree(Ti, SubNode[i]) theo bảng Ti và node con thứ i
		}
		
		else
		// nếu thuộc tính vừa tìm được là thuộc tính liên tục
		{
			// sinh ra 1 mốc ứng với thuộc tính liên tục vừa chọn
			// gọi tập các giá trị của thuộc tính vừa tìm được: a1, a2, ... an
			// sắp xếp các giá trị này theo thứ tự từ lớn đến nhỏ: v1, v2, ..., vn

			// tính các giá trị: m(i) = (v(i) + v(i+1))/2
			// lần lượt chọn giá trị m(i) làm mốc 

			// tính lại giá trị GainRatio(X, moc) với X: thuộc tính liên tiếp vừa tìm được và mốc là m(i) 
			

			// tìm giá trị lớn nhất trong tất cả các GainRatio() - giả sử với m(k) thì GainRatio(X, m(k)) là lớn nhất


			// --> chọn m(k) làm  mốc
			//query bảng HumanTable theo mốc vừa chọn, 
			// -- > mốc: đưa vào 1 mảng --> đệ quy theo mảng này



			// -- < mốc: đưa vào 1 mảng khác --> đệ quy theo mảng này



		}
	}
	
	return 0;
}
int CheckClass(Human[] HumanTable, int HumanInTableNumber)
{
	int		i;

	for (i=1; i<HumanInTableNumber; i++)
		if (Human[i].dwClass =! Human[i+1].dwClass)
			return -1;
	return 1;
}
int main()
{
	Human	Nguoi[100];
	int		HumanNumber;		
	//doc du lieu


	//xay dung cay
	Tree DecisionTree;
	DecisionTree.dwLeafNumber = 0;
	DecisionTree.dwNonLeafNumber = 0;
	DecisionTree.root = NULL;
	DecisionTree.root = (Node*) malloc(sizeof(Node));


	if (CheckClass(Human, HumanNumber) == 1) 
	{
		//tất cả các bản ghi trong bảng thuộc Human đều có chung giá trị class 
		// --> cây càn tạo chỉ có 1 node
		// --> nếu dùng cây nàu đi train thì bất kỳ record mới nào cũng dc phân loại giống nhau (giống giá trị class trên)
		return 1;
	}
	else 
	{
		// nếu thuộc tính Class trong các record khác nhau 
		// xây dựng 1 cây Tree dựa trên 
		// --> human				: bảng các thuộc tính
		// --> HumanNumber			: số lượng record trong bảng Human (nếu dùng qpl truy vấn không vần đến tham số này)
		// --> DecisionTree.root	: node hiện tại đang xét
		//
		// nếu dùng qpl truy vấn thì chắc ko cần đến tham số HumanNumber này
		
		BuildTree(Human, HumanNumber, DecisionTree.root);
	}

	return 0;
}