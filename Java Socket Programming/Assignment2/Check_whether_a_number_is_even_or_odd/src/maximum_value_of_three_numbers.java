import java.util.Scanner;
public class maximum_value_of_three_numbers {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Enter three numbers: ");
        int a = sc.nextInt();
        int b = sc.nextInt();
        int c = sc.nextInt();

        if (a >= b && a >= c) {
            System.out.println(a + " is the maximum number.");
        } else if (b >= a && b >= c) {
            System.out.println(b + " is the maximum number.");
        } else {
            System.out.println(c + " is the maximum number.");
        }
    }
}
